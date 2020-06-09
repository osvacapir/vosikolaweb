<?php

$smarty = new Template();

$multa = new Multa();
$multa->GetMulta();

$smarty->assign('MULTA',$multa->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetMulta());
$smarty->assign('PAG_MULTA', Rotas::pag_Multa());
$smarty->assign('SMS_ERRO', $multa->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $multa->GetMultaID($id);
    foreach ($multa->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($multa->Apaga($id)) {
        $multa->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $multa->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Multa());
}

$smarty->assign('SMS_ERRO', $multa->alert);
$smarty->display('multa.tpl');

?>