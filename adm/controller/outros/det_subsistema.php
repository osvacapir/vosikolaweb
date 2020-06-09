<?php

$id = 0;
$valores = array();
$smarty = new Template();

$subsistema = new Subsistema();
$smarty->assign('PAG_EDIT', Rotas::pag_DetSubsistema());
$smarty->assign('PAG_SUBSISTEMA', Rotas::pag_Subsistema());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($subsistema->Grava($valores)) {
        $subsistema->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $subsistema->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Subsistema());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $subsistema->GetSubsistemaID($id);
        foreach ($subsistema->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $subsistema->alert);
$smarty->display('det_subsistema.tpl');
?>
  