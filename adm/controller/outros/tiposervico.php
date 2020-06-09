<?php

$smarty = new Template();

$tiposervico = new TipoServico();
$tiposervico->GetTipoServicoL();

$smarty->assign('TIPOSERVICO',$tiposervico->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTiposervico());
$smarty->assign('PAG_TIPOSERVICO', Rotas::pag_Tiposervico());
$smarty->assign('SMS_ERRO', $tiposervico->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $tiposervico->GetTipoServicoID($id);
    foreach ($tiposervico->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($tiposervico->Apaga($id)) {
        $tiposervico->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tiposervico->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tiposervico());
}

$smarty->assign('SMS_ERRO', $tiposervico->alert);
$smarty->display('tiposervico.tpl');

?>