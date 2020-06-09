<?php

$smarty = new Template();
$usuar = new Usuario();
$usuar->GetUsuario();

$smarty->assign('USUARIO', $usuar->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetUsuario());
$smarty->assign('PAG_USUARIO', Rotas::pag_Usuario());
$smarty->assign('SMS_ERRO', $usuar->alert);

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $usuar->GetUsuarioID($id);
    foreach ($usuar->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($usuar->Apaga($id)) {
        $usuar->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $usuar->setAlert('Registo não apagado');
    }
}

$smarty->assign('SMS_ERRO', $usuar->alert);
$smarty->display('usuario.tpl');

?>