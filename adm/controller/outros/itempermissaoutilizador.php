<?php

$smarty = new Template();

$itemperm = new ItemPermissaoUtilizador();
$itemperm->GetItemPermissaoUtilizador();

$smarty->assign('ITEMPER',$itemperm->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetItempermissaoutilizador());
$smarty->assign('PAG_ITEMPER', Rotas::pag_Itempermissaoutilizador());
$smarty->assign('SMS_ERRO', $itemperm->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $itemperm->GetItemPermissaoUtilizadorID($id);
    foreach ($itemperm->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($itemperm->Apaga($id)) {
        $itemperm->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $itemperm->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Itempermissaoutilizador());
}

$smarty->assign('SMS_ERRO', $itemperm->alert);
$smarty->display('itempermissaoutilizador.tpl');

?>