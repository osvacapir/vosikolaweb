<?php

$smarty = new Template();

$turma = new Turma();
$matricula = new Matricula();
$estado = new Estado();
$aluno = new Aluno();
$pessoa = new Pessoa();
$lingua_op = new LinguaOpcao();
$vaga = 0;
$qtd_mat = 0;
$qtd_cap = 0;
$texto = "";
$count = 0;
$codigo = 0;
$lingua = 0;
$stdo = 0;
$dados = array();
$lista_query = array();
if (isset(Rotas::$pag[1]) && Rotas::$pag[1] > 0) {

    $id = Rotas::$pag[1];
    $turma->GetTurma($id);
    if ($turma->TotalDados() > 0) {
        //var_dump($turma->GetItens());
        $matricula->GetAlunosMatriculados($id);
        $qtd_mat = $matricula->TotalDados();
        // echo 'ACHEI '; //.$qtd_mat;
        //$turma->setObject($obj, $turma->GetItem())
        $qtd_cap = (int) $turma->GetItem()['Vaga_Alunos'];
        $vaga = $qtd_cap - $qtd_mat;

        $smarty->assign('QTD_T', $qtd_cap);
        $smarty->assign('QTD_V', $vaga);
        $smarty->assign('QTD_M', $qtd_mat);

        $smarty->assign('TURMA', $turma->GetItens());
        $smarty->assign('MATRICULADOS', $matricula->GetItens());
    } else {
        $matricula->setAlert("Esta turma não foi criada uma Turma", 1, "temp");
        echo '' . $matricula->alert;
        // Rotas::Redirecionar(2, Rotas::pag_Turma());
    }

    $lingua_op->GetLinguaOpcao();
    $smarty->assign('LINGUA', $lingua_op->GetItens());

    $estado->GetEstado();
    $smarty->assign('ESTADO', $estado->GetItens());
//$smarty->assign('VOLTAR', Sistema::VoltarPagina());
    $smarty->assign('DADOS', $dados);
    $smarty->assign('PAG_MATRICULA', Rotas::pag_Matricula());
    $smarty->assign('GET_HOME', Rotas::get_SiteADM());

    if (isset($_POST['buscar'])) {
        print_r($_FILES['arquivo']['tmp_name']);
        if (!empty($_FILES['arquivo']['tmp_name'])) {

            $arquivo = $_FILES['arquivo']['tmp_name'];
            if ($xlsx = SimpleXLSX::parse($arquivo)) {
                $header_values = $rows = [];
                foreach ($xlsx->rows() as $k => $r) {
                    if ($k === 0) {
                        $header_values = $r;
                        continue;
                    }
                    $rows[] = array_combine($header_values, $r);
                }
                $smarty->assign('DADOS', $rows);
            }
        }
        //Rotas::Redirecionar(0, Rotas::pag_Turma());
    }
    if (isset($_POST['bt_adicionar'])) {
        $count = 0;
        $codigo = 0;
        $nome = "";
        $sexo = "";
        //$data=isset() ? $_SESSION['sys']['data_actual']:0;

        for ($a = 0; $a < $vaga; $a++) {

            $codigo = isset($_POST['Cod_' . $a]) ? $_POST['Cod_' . $a] : 0;
            $nome = $_POST['Nome_' . $a];
            $sexo = isset($_POST['Sexo_' . $a]) ? $_POST['Sexo_' . $a] : "M";

            $vlr_pessoa = array(
                'Codigo' => $codigo,
                'Nome' => $nome,
                'Sexo' => $sexo
            );
            echo '<pre>';
            print_r($vlr_pessoa);
            echo '</pre>';
            $vlr_aluno = array(
                'Codigo_Utilizador' => $_SESSION['USER']['Codigo'],
                'Codigo_Curso' => $turma->GetItens()[1]['Codigo_Curso'],
                'Codigo_Pessoa' => 'LAST_INSERT_ID()'
            );
            $vlr_matricula = array(
                'Codigo_Aluno' => 'LAST_INSERT_ID()', //' SELECT LAST_INSERT_ID()',
                //'Data_Matricula' => $_SESSION['SYS']['data_actual'],
                'Codigo_Turma' => $turma->GetItens()[1]['Codigo'],
                'Codigo_Ano_Lectivo' => $_SESSION['SYS']['CodAno'],
                'Codigo_Utilizador' => $_SESSION['USER']['Codigo'],
                'Codigo_Escola' => $_SESSION['SYS']['CodEscola'],
                'Codigo_Estado' => 1
            );
            $lista_query = array(
                0 => cria_query_massa(Tab::PESSOA, $vlr_pessoa, ['Codigo' => $codigo]),
                1 => cria_query_massa(Tab::ALUNO, $vlr_aluno),
                2 => cria_query_massa(Tab::MATRICULA, $vlr_matricula)
            );


            if ($matricula->ExecutaSQL_massa($lista_query)) {
                $count++;
                //    Rotas::Redirecionar(0, Rotas::pag_Matricula() . "/" . $id);
            }
        }
        if ($count > 0) {
            $matricula->setAlert("Gravou " . $count . " registos", 2);
        }
    }

    if (isset($_POST['bt_gravar'])) {
        $count = 0;
        $texto = "";
        for ($a = 1; $a <= $qtd_mat; $a++) {
            if (isset($_POST['nome_' . $a])) {
                continue;
            }
            $codigo = empty($_POST['codigo_' . $a]) ? 0 : $_POST['codigo_' . $a];
            $nome = $_POST['nome_' . $a];
            $lingua = empty($_POST['lingua_' . $a]) ? null : $_POST['lingua_' . $a];
            $stdo = empty($_POST['estado_' . $a]) ? null : $_POST['estado_' . $a];
            $num_ord = empty($_POST['check_' . $a]) ? null : $_POST['check_' . $a];

            if ($codigo > 0) {

                $valores_inserir = array(
                    'Codigo' => $codigo,
                    'Codigo_Lingua_Opcao' => $lingua,
                    'Num_Ordem' => $num_ord,
                    'Codigo_Estado' => $stdo,
                );
                if ($matricula->GravaM($valores_inserir)) {
                    $count = $count + 1;
                    $texto .= $nome . ', ';
                }
            }
        }

        if ($count > 0) {
            $matricula->setAlert($count . ' ACTUALIZOU ' . $count . " alunos", 2);
            Rotas::Redirecionar(1, Rotas::pag_Matricula() . '/' . $id);
        } else {
            $matricula->setAlert('SEM ACTUALIZAÇÕES!', 1);
        }
        unset($_POST);
    }
    if (isset($_GET['btApagar'])) {
        $valores_inserir = array(
            "Codigo" => $_GET['Codigo']
        );
        $matricula->table = 'tb_turma';
        if ($matricula->Apagar($valores_inserir)) {
            $matricula->erro = array(" Registo Eliminado com Sucesso", 2);
            Rotas::Redirecionar(1, Rotas::pag_Matricula() . '/' . $id);
        } else {

            $matricula->setAlert("Problemas ao Eliminar");
        }
        unset($_POST);
    }
    if (isset($_POST['bt_apaga_m'])) {

        if (isset($_POST['check'])) {
            foreach ($_POST['check'] as $key => $value) {
                $valores_inserir = array(
                    "Codigo" => $value);
                if ($matricula->Apagar($valores_inserir)) {
                    $count = $count + 1;
                    $texto .= '<br>' . $value . ', ';
                }
            }
        } else {
            
        }
        if ($count > 0) {
            $matricula->setAlert(' APAGOU ' . $count . ' Matriculas' . $texto, 2);
            Rotas::Redirecionar(1, Rotas::pag_Matricula() . '/' . $id);
        } else {
            $matricula->setAlert('SEM ACTUALIZAÇÕES!', 1);
        }
        unset($_POST);
    }

//  unset($_POST);

    $count = 0;
    $texto = "";
    $smarty->assign('SMS_ERRO', $matricula->alert);
    $smarty->display('matricula.tpl');
} else {
    $matricula->setAlert("Selecione uma Turma", 1, "temp");
    echo '' . $matricula->alert;
    Rotas::Redirecionar(2, Rotas::pag_Turma());
}
$ante = 0;

function cria_query_massa($tabela, $obj, $cond = null): string {

    global $ante;
  
    $query = "INSERT INTO {$tabela}(" . implode(",", array_keys((array) $obj)) . ") VALUES('" . implode("','", array_values((array) $obj)) . "');";
    if (!is_null($cond)) {
        $codigo1 = isset($obj['Codigo']) && $obj['Codigo'] > 0 ? 'Codigo' : '';
        $codigo2 = isset($obj['Codigo_Pessoa']) && $obj['Codigo_Pessoa'] > 0 ? 'Codigo_Pessoa' : '';
        $codigo3 = isset($obj['Codigo_Aluno']) && $obj['Codigo_Aluno'] > 0 ? 'Codigo_Aluno' : '';
        $codigo = $codigo1 . $codigo2 . $codigo3;
        foreach ($obj as $ind => $val) {
            if ($ind != $codigo) {
                //echo 'VAL - '.$ind.'->'.$val  ;
                $dados[] = "{$ind}= " . (is_null($val) ? " NULL " : "'{$val}'");
            }
        }
        foreach ($cond as $ind => $val) {
            $where[] = "{$ind}= " . (is_null($val) ? " NULL " : "'{$val}'");
        }
        $query = "UPDATE {$tabela} SET " . implode(',', $dados) . " WHERE " . implode(' AND ', $where) . ";";
        $ante = $obj['Codigo'];  
        echo 'Achei->'.$ante;
    }
    if ($ante > 0)
        $query = str_replace("LAST_INSERT_ID()", $ante, $query);
    else
        $query = str_replace("'LAST_INSERT_ID()'", 'LAST_INSERT_ID()', $query);
    return $query;
}

/*

  $smarty->assign('ANO_L','Página do ANO LECTIVO');
 */
?>