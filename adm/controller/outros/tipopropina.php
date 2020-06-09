<?php

$smarty = new Template();

$tipopropina = new TipoPropina();
$tipopropina->GetTipoPropina();

$smarty->assign('TIPOPROPINA',$tipopropina->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipopropina());
$smarty->assign('PAG_TIPOPROPINA', Rotas::pag_Tipopropina());
$smarty->assign('SMS_ERRO', $tipopropina->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $tipopropina->GetTipoPropinaID($id);
    foreach ($tipopropina->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($tipopropina->Apaga($id)) {
        $tipopropina->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tipopropina->setAlert('Registo não apagado');
    }
   Rotas::Redirecionar(1, Rotas::pag_Tipopropina());
}

$smarty->assign('SMS_ERRO', $tipopropina->alert);
$smarty->display('tipopropina.tpl');

?>