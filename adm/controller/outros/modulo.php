<?php

$smarty = new Template();

$modulo = new Modulo();
$modulo->GetModulo();

$smarty->assign('MODULO',$modulo->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetModulo());
$smarty->assign('PAG_MODULO', Rotas::pag_Modulo());
$smarty->assign('SMS_ERRO', $modulo->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $modulo->GetModuloID($id);
    foreach ($modulo->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($modulo->Apaga($id)) {
        $modulo->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $modulo->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Modulo());
}

$smarty->assign('SMS_ERRO', $modulo->alert);
$smarty->display('modulo.tpl');

?>