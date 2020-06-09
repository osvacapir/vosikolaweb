<?php

$smarty = new Template();

$provincia = new Provincia();
$provincia->GetProvincia();

$smarty->assign('PROVINCIA',$provincia->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetProvincia());
$smarty->assign('PAG_PROVINCIA', Rotas::pag_Provincia());
$smarty->assign('SMS_ERRO', $provincia->alert); 

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
    if ($provincia->Apaga($id)) {
        $provincia->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $provincia->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Provincia());
}

$smarty->assign('SMS_ERRO', $provincia->alert);
$smarty->display('provincia.tpl');

?>