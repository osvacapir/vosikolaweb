<?php

$smarty = new Template();

$password = new Password();
$password->GetPassword();

$smarty->assign('PASSWORD',$password->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPassword());
$smarty->assign('PAG_PASSWORD', Rotas::pag_Password());
$smarty->assign('SMS_ERRO', $password->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $password->GetPasswordID($id);
    foreach ($password->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($password->Apaga($id)) {
        $password->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $password->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Password());
}

$smarty->assign('SMS_ERRO', $password->alert);
$smarty->display('password.tpl');

?>