<?php

$smarty = new Template();

$tiposutilizador = new TiposUtilizador();
$tiposutilizador->Gettiposutilizador();

$smarty->assign('TIPOUTILIZADOR',$tiposutilizador->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTiposutilizador());
$smarty->assign('PAG_TIPOUTILIZADOR', Rotas::pag_Tiposutilizador());
$smarty->assign('SMS_ERRO', $tiposutilizador->alert); 

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
    if ($tiposutilizador->Apaga($id)) {
        $tiposutilizador->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tiposutilizador->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tiposutilizador());
}

$smarty->assign('SMS_ERRO', $tiposutilizador->alert);
$smarty->display('tiposutilizador.tpl');

?>