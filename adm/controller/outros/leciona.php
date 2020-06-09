<?php

$smarty = new Template();

$leciona = new Leciona();
$leciona->GetLeciona();

$smarty->assign('LECIONA',$leciona->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetLeciona());
$smarty->assign('PAG_LECIONA', Rotas::pag_Leciona());
$smarty->assign('SMS_ERRO', $leciona->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $leciona->GetLecionaID($id);
    foreach ($leciona->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($leciona->Apaga($id)) {
        $leciona->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $leciona->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Leciona());
}

$smarty->assign('SMS_ERRO', $leciona->alert);
$smarty->display('leciona.tpl');

?>