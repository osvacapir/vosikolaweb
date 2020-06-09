<?php

$smarty = new Template();

$tipoavaliacao = new TipoAvaliacao();
$tipoavaliacao->GetTipoAvaliacao();

$smarty->assign('TIPOAVALIAC',$tipoavaliacao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipoavaliacao());
$smarty->assign('PAG_TIPOAVALIAC', Rotas::pag_Tipoavaliacao());
$smarty->assign('SMS_ERRO', $tipoavaliacao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $tipoavaliacao->GetTipoAvaliacaoID($id);
    foreach ($tipoavaliacao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($tipoavaliacao->Apaga($id)) {
        $tipoavaliacao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tipoavaliacao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipoavaliacao());
}

$smarty->assign('SMS_ERRO', $tipoavaliacao->alert);
$smarty->display('tipoavaliacao.tpl');

?>