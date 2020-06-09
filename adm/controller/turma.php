
<?php

$smarty = new Template();
$def_escola = new DefEscola();
$def_escola->GetDefEscola();
$turma = new Turma();
$classe = new Classe();
$curso = new Cursos();
$sala = new Sala();
$periodo = new Periodo();
$ano = new AnoLectivo();
$sub_sis = new Subsistema();
$estado = new Estado();
$professor = new Professor();
$turma->GetTurma();
$capacidade = $def_escola->GetItens()[1]['Num_Turmas'];
$vaga = (int) ($def_escola->GetItens()[1]['Num_Turmas'] - $turma->TotalDados());
$classe->GetClasse();
$curso->GetCursos();
$sala->GetSala();
$periodo->GetPeriodo();
$sub_sis->GetSubsistemaEscola();
$estado->GetEstado();
$professor->GetProfessor();
//$turma->setAlert();
$smarty->assign('TURMA', $turma->GetItens());
$smarty->assign('QTD_T', $turma->TotalDados());
$sub_sis->GetSubsistemaEscola();
$smarty->assign('QTD_V', $capacidade);
$smarty->assign('CLASSE', $classe->GetItens());
$smarty->assign('CURSO', $curso->GetItens());
$smarty->assign('SALA', $sala->GetItens());
$smarty->assign('PERIODO', $periodo->GetItens());
$smarty->assign('SUB', $sub_sis->GetItens());
$smarty->assign('PROFESSOR', $professor->GetItens());
$smarty->assign('ESTADO', $estado->GetItens());
$count = 0;
$texto = "";

if (isset($_POST['bt_apaga']) && $_POST['bt_apaga'] > 0) {
    $id = $_POST['bt_apaga'];
    $turma->GetTurma($id);
    /* foreach ($turma->GetItens()[1] as $campo => $valor) {
      $smarty->assign(strtoupper($campo), $valor);
      }
     */
    if ($turma->Apaga($id)) {
        $turma->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $turma->setAlert('Registo não apagado');
    }
    $id = 0;
    unset($_POST);
    Rotas::Redirecionar(1, Rotas::pag_Turma());
}if (isset($_POST['bt_grava'])) {
    $count = 0;
    $texto = "";
    /* echo '<pre>';
      print_r($_POST);
      echo '</pre>'; */
    for ($a = 1; $a <= $vaga; $a++) {
        $valores = array(
            'Codigo' => $_POST['codigo_' . $a],
            'Designacao' => $_POST['nome_' . $a],
            'Codigo_Classe' => $_POST['classe_' . $a],
            'Codigo_Curso' => $_POST['curso_' . $a],
            'Codigo_Sala' => $_POST['sala_' . $a],
            'Codigo_Periodo' => $_POST['periodo_' . $a],
            'Codigo_Estado' => $_POST['estado_' . $a],
            'Vaga_Alunos' => $_POST['vaga_' . $a],
            'Codigo_AnoLectivo' => $_SESSION['SYS']['CodAno'],
           // 'Codigo_Escola' => $_SESSION['SYS']['CodEscola'],
            'Codigo_Subsistema' => $_POST['sub_' . $a],
            'Codigo_Professor' => $_POST['prof_' . $a]);
        /*  echo '<pre>';
          print_r($valores);
          echo '</pre>';
         */
        if (empty($_POST['nome_' . $a]) 
                || empty($_POST['classe_' . $a]) 
                || empty($_POST['curso_' . $a]) 
                || empty($_SESSION['SYS']['CodAno']) 
                || empty($_POST['sub_' . $a])) {
            
        } else {
            if ($turma->Grava($valores)) {

                $count = $count + 1;
                $texto .= $_POST['nome_' . $a] . ', ';
            }
        }
    }
    if ($count > 0) {
        $turma->setAlert($count . ' REGISTOS GRAVADOS!<br>' . $texto, 2);
        //   
    } else {
        $turma->setAlert('NENHUM REGISTO GRAVADO!');
    }
    $count = 0;
    $texto = "";
    unset($_POST);
    Rotas::Redirecionar(0, Rotas::pag_Turma());
}

$smarty->assign('PAG_MATRICULA', Rotas::pag_Matricula());
$smarty->assign('PAG_TURMA', Rotas::pag_Turma());
$smarty->assign('SMS_ERRO', $turma->alert);
$smarty->assign('MODAL', "ME TE SE");
$smarty->display('turma.tpl');
?>
