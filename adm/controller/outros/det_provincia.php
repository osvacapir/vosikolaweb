<?php

$id = 0;
$valores = array();
$smarty = new Template();

$provincia = new Provincia();
$smarty->assign('PAG_EDIT', Rotas::pag_DetProvincia());
$smarty->assign('PAG_PROVINCIA', Rotas::pag_Provincia());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($provincia->Grava($valores)) {
        $provincia->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $provincia->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Provincia());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $provincia->GetProvinciaID($id);
        foreach ($provincia->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $provincia->alert);
$smarty->display('det_provincia.tpl');
?>
  