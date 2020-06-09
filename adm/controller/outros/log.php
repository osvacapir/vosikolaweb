<?php

$smarty = new Template();

$log = new Log();
$log->GetLog();

$smarty->assign('LOG',$log->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetLog());
$smarty->assign('PAG_LOG', Rotas::pag_Log());
$smarty->assign('SMS_ERRO', $log->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $log->GetLogID($id);
    foreach ($log->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($log->Apaga($id)) {
        $log->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $log->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Log());
}

$smarty->assign('SMS_ERRO', $log->alert);
$smarty->display('log.tpl');

?>