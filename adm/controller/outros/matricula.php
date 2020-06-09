<?php

$smarty = new Template();

$turma = new Turma();
$matricula = new Matricula();
$estado = new Estado();
$aluno = new Aluno();
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

if (isset(Rotas::$pag[1])) {
    if (Rotas::$pag[1] > 0) {
        $id = Rotas::$pag[1];
        $turma->GetTurma($id);
        if ($turma->TotalDados() > 0) {
//        var_dump($turma->GetItens());
            $matricula->GetAlunosMatriculados($id);
            $qtd_mat = $matricula->TotalDados();
            //$turma->setObject($obj, $turma->GetItem())
            $qtd_cap = (int) $turma->GetItem()['Vaga_Alunos'];
            $vaga = $qtd_cap - $qtd_mat;

            $smarty->assign('QTD_T', $qtd_cap);
            $smarty->assign('QTD_V', $vaga);
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
    } else {
        $matricula->setAlert("Selecione uma Turma", 1, "temp");
        echo '' . $matricula->alert;
        Rotas::Redirecionar(2, Rotas::pag_Turma());
    }
    if (isset($_POST['buscar'])) {
        if (!empty($_FILES['arquivo']['tmp_name'])) {
            $arquivo = new DomDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            //var_dump($arquivo);
            $linhas = $arquivo->getElementsByTagName("Row");
            //var_dump($linhas);
            $primeira_linha = true;
            //$i = 0;
            foreach ($linhas as $linha) {
                $pessoa = array();
                if ($primeira_linha == false) {
                    $codigo = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    $nome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    $sexo = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                    //   $data = Sistema::Fdata_D_M_A($linha->getElementsByTagName("Data")->item(3)->nodeValue);
                    $pessoa = array(
                        'Codigo' => $codigo,
                        'Nome' => $nome,
                        'Sexo' => $sexo
                    );
                    /*   $aluno = array(
                      'Codigo_Pessoa' => $codigo,
                      'Codigo_Escola' => $codigo
                      );
                      $matri = array(
                      'Codigo_Pessoa' => $codigo,
                      'Codigo_Pessoa' => $codigo,
                      'Codigo_Escola' => $codigo
                      );
                     */
                    $dados[] = $pessoa;

                    /* array(
                      'pessoa' => $pessoa
                      'aluno' => $aluno,
                      'matricula' => $pessoa
                      ); */
                    //   echo "Nome: $nome ";
                    //  echo "E-mail: $sexo <br>";
                    //   echo "<hr>";
                }
                $primeira_linha = false;
            }
            //echo 'KEY' . key($listas9);
            /*  echo 'ARRAY<br>';
              echo '<pre>';
              print_r($dados);
              echo '</pre>';
              //echo 'LINHA<br>';
              //var_dump($linhas); */
        }
    } elseif (isset($_POST['bt_adicionar'])) {
        $count = 0;
        $codigo = 0;
        $nome = "";
        $sexo = "";
        //$data=isset() ? $_SESSION['sys']['data_actual']:0;

        for ($a = 1; $a < $vaga; $a++) {
            echo '<br>CLICAOU bt_inserir= ' . $a;
            if (isset($_POST['Cod_' . $a]) || empty($_POST['Cod_' . $a])) {
                $Codigo = $_POST['Cod_' . $a];
            }
            if (isset($_POST['Nome_' . $a]) || empty($_POST['Nome_' . $a]))
                $nome = $_POST['Nome_' . $a];
            if (isset($_POST['Sexo_' . $a]) || empty($_POST['Sexo_' . $a])) {
                $sexo = $_POST['Sexo_' . $a];
            }
            $vlr_pessoa = array(
                'Codigo' => $codigo,
                'Nome' => $nome,
                'Sexo' => $sexo
            );
            $pessoa = new Pessoa();
            if ($pessoa->GravaP($vlr_pessoa)) {
                echo 'PESSOA';
                $idP = $pessoa->Ultimo();
                $count++;
                $texto .= 'Nome: ' . $_POST['Nome_' . $a] . ', ';
                //$matricula->setAlert("Inseriu ", 2);
                $vlr_aluno = array(
                    'Codigo' => $codigo,
                    'Codigo_Utilizador' => $_SESSION['USER']['Codigo'],
                    'Codigo_Curso' => $turma->GetItens()[1]['Codigo_Curso'],
                    'Codigo_Pessoa' => 24
                );
                print_r($vlr_aluno);
                if ($aluno->Grava($vlr_aluno)) {
                    echo 'ALUNO';
                    $id = $aluno->UltimoID();
                    $vlr_matricula = array(
                        'Codigo' => $codigo,
                        'Codigo_Aluno' => (10 + $a), //' SELECT LAST_INSERT_ID()',
                        'Data_Matricula' => $_SESSION['sys']['data_actual'],
                        'Codigo_Turma' => $turma->GetItens()[1]['Codigo'],
                        'Codigo_Ano_Lectivo' => $_SESSION['SYS']['CodAno'],
                        'Codigo_Utilizador' => $_SESSION['USER']['Codigo'],
                        'Codigo_Escola' => $_SESSION['SYS']['CodEscola'],
                        'Codigo_Estado' => 0,
                    );
                    if ($matricula->GravaM($vlr_matricula)) {
                        echo 'MATRICULA';
                        $count++;
                        $id = $matricula->UltimoID();
                    } else {
                        
                    }
                } else {
                    
                }
                $matricula->setAlert("Carregue o ficheiro<strong> F_100</strong>, para adicionar grupo de alunos", 1);
            }
        }
        if ($count > 0)
            $matricula->setAlert($texto, 2);
    } elseif (isset($_POST['bt_gravar'])) {
        $count = 0;
        $texto = "";
        for ($a = 1; $a <= $qtd_mat; $a++) {
            $codigo = empty($_POST['codigo_' . $a]) ? 0 : $_POST['codigo_' . $a];
            $nome = empty($_POST['nome_' . $a]) ? '' : $_POST['nome_' . $a];
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
        } else {
            $matricula->setAlert('SEM ACTUALIZAÇÕES!', 1);
        }

       
        Rotas::Redirecionar(1, Rotas::pag_Matricula() . '/' . $id);
    } else if (isset($_GET['btApagar'])) {
        $valores_inserir = array(
            "Codigo" => $_GET['Codigo']
        );
        $matricula->table = 'tb_turma';
        if ($matricula->Apagar($valores_inserir)) {
            $matricula->erro = array(" Registo Eliminado com Sucesso", 2);
        } else {

            $matricula->setAlert("Problemas ao Eliminar");
        }
    } else if (isset($_POST['bt_apaga_m'])) {
   

        if (isset($_POST['check'])) {
            foreach ($_POST['check'] as $key => $value) {
                $valores_inserir = array(
                    "Codigo" => $value);
                if ($matricula->Apagar($valores_inserir)) {
                    $count = $count + 1;
                    $texto .= '\n' . $value . ', ';
                }
            }
        } else {
            
        }
        if ($count > 0) {
            $matricula->setAlert(' APAGOU ' . $count . ' Matriculas' . $texto, 2);
        } else {
            $matricula->setAlert('SEM ACTUALIZAÇÕES!', 1);
        }
    }
}
 $count = 0;
        $texto = "";
$smarty->assign('SMS_ERRO', $matricula->alert);
$smarty->display('matricula.tpl');

/*

  $smarty->assign('ANO_L','Página do ANO LECTIVO');
 */
?>