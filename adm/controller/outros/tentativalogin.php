<?php

$smarty = new Template();

$tentativalogin = new TentativaLogin();
$tentativalogin->GetTentativaLogin();

$smarty->assign('TENTATIVALOGIN',$tentativalogin->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetTentativaLogin());
$smarty->assign('PAG_TENTATIVALOGIN', Rotas::pag_TentativaLogin());
$smarty->assign('SMS_ERRO', $tentativalogin->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $tentativalogin->GetTentativaLoginID($id);
    foreach ($tentativalogin->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($tentativalogin->Apaga($id)) {
        $tentativalogin->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $tentativalogin->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_TentativaLogin());
}

$smarty->assign('SMS_ERRO', $tentativalogin->alert);
$smarty->display('tentativalogin.tpl');

?>