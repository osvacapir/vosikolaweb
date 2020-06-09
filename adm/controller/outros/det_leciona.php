<?php

$id = 0;
$valores = array();
$smarty = new Template();

$leciona = new Leciona();
$smarty->assign('PAG_EDIT', Rotas::pag_DetLeciona());
$smarty->assign('PAG_LECIONA', Rotas::pag_Leciona());

$modul = new Modulo();
$modul->GetModulo();
$smarty->assign('MODULO',$modul->GetItens());

$professor = new Professor();
$professor->GetProfessor();
$smarty->assign('PROFESSOR',$professor->GetItens());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
    "CodigoModulo" => '',
    "CodigoProfessor" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Designacao' => $_GET['Designacao'],
        'CodigoModulo' => $_GET['CodigoModulo'],
        'CodigoProfessor' => $_GET['CodigoProfessor']
    );
    if ($leciona->Grava($valores)) {
        $leciona->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $leciona->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Leciona());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $leciona->GetLecionaID($id);
        foreach ($leciona->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $leciona->alert);
$smarty->display('det_leciona.tpl');
?>
  