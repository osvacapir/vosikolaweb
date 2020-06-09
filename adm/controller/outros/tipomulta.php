<?php

$smarty = new Template();

$tipomulta = new TipoMulta();
$tipomulta->GetTipoMulta();

$smarty->assign('TIPOMULTA',$tipomulta->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipomulta());
$smarty->assign('PAG_TIPOMULTA', Rotas::pag_Tipomulta());
$smarty->assign('SMS_ERRO', $tipomulta->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $tipomulta->GetTipoMultaID($id);
    foreach ($tipomulta->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($tipomulta->Apaga($id)) {
        $tipomulta->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tipomulta->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipomulta());
}

$smarty->assign('SMS_ERRO', $tipomulta->alert);
$smarty->display('tipomulta.tpl');

?>