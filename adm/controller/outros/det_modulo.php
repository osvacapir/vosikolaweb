<?php

$id = 0;
$valores = array();
$smarty = new Template();

$modulo = new Modulo();
$smarty->assign('PAG_EDIT', Rotas::pag_DetModulo());
$smarty->assign('PAG_MODULO', Rotas::pag_Modulo());

$turma = new Turma();
$turma->GetTurma();
$smarty->assign('TURMA',$turma->GetItens());

$disciplin = new Disciplinas();
$disciplin->GetDisciplinas();
$smarty->assign('DISCIPLINA',$disciplin->GetItens());

$anolectiv = new AnoLectivo();
$anolectiv->GetAnoLectivos();
$smarty->assign('ANOLECTIV',$anolectiv->GetItens());

$classe = new Classe();
$classe->GetClasses();
$smarty->assign('CLASSES',$classe->GetItens());

$curso = new Cursos();
$curso->GetCursos();
$smarty->assign('CURSO',$curso->GetItens());

$professor = new Professor();
$professor->GetProfessor();
$smarty->assign('PROFESS',$professor->GetItens());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
    "Codigo_Turma" => '',
    "Codigo_Disciplina" => '',
    "Codigo_AnoLectivo" => '',
    "Codigo_Classe" => '',
    "Codigo_Curso" => '',
    "Codigo_Professor" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Designacao' => $_GET['Designacao'],
        'Codigo_Turma' => $_GET['Codigo_Turma'],
        'Codigo_Disciplina' => $_GET['Codigo_Disciplina'],
        'Codigo_AnoLectivo' => $_GET['Codigo_AnoLectivo'],
        'Codigo_Classe' => $_GET['Codigo_Classe'],
        'Codigo_Curso' => $_GET['Codigo_Curso'],
        'Codigo_Professor' => $_GET['Codigo_Professor'],
    );
    if ($modulo->Grava($valores)) {
        $modulo->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $modulo->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_modulo());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $modulo->GetModuloID($id);
        foreach ($modulo->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $modulo->alert);
$smarty->display('det_modulo.tpl');
?>
  