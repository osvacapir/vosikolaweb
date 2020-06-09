<?php

$smarty = new Template();

$propina = new Propina();
$propina->GetPropina();

$smarty->assign('PROPINA',$propina->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPropina());
$smarty->assign('PAG_PROPINA', Rotas::pag_Propina());
$smarty->assign('SMS_ERRO', $propina->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $propina->GetPropinaID($id);
    foreach ($propina->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($propina->Apaga($id)) {
        $propina->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $propina->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Propina());
}

$smarty->assign('SMS_ERRO', $propina->alert);
$smarty->display('propina.tpl');

?>