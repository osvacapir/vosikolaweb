<?php

$smarty = new Template();

$parametro = new Parametro();
$parametro->GetParametro();

$smarty->assign('PARAMENTRO',$parametro->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetParametro());
$smarty->assign('PAG_PARAMENTRO', Rotas::pag_Parametro());
$smarty->assign('SMS_ERRO', $parametro->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $parametro->GetParametroID($id);
    foreach ($parametro->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($parametro->Apaga($id)) {
        $parametro->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $parametro->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Parametro());
}

$smarty->assign('SMS_ERRO', $parametro->alert);
$smarty->display('parametro.tpl');

?>