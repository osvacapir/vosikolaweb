<?php

$smarty = new Template();

$estadocivil = new EstadoCivil();
$estadocivil->GetEstadoCivil();

$smarty->assign('ESTADOCIVIL',$estadocivil->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEstadoCivil());
$smarty->assign('PAG_ESTADOCIVIL', Rotas::pag_EstadoCivil());
$smarty->assign('SMS_ERRO', $estadocivil->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $estadocivil->GetEstadoCivilID($id);
    foreach ($estadocivil->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($estadocivil->Apaga($id)) {
        $estadocivil->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $estadocivil->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_EstadoCivil());
}

$smarty->assign('SMS_ERRO', $estadocivil->alert);
$smarty->display('estadocivil.tpl');

?>