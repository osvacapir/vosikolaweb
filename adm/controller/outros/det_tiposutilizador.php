<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tiposutilizador = new TiposUtilizador();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTiposutilizador());
$smarty->assign('PAG_TIPOUTILIZADOR', Rotas::pag_Tiposutilizador());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($tiposutilizador->Grava($valores)) {
        $tiposutilizador->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tiposutilizador->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tiposutilizador());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tiposutilizador->GetTiposUtilizadorID($id);
        foreach ($tiposutilizador->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tiposutilizador->alert);
$smarty->display('det_tiposutilizador.tpl');
?>
  