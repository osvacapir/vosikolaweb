<?php

$smarty = new Template();

$entragadeclara = new EntregaDeclarcao();
$entragadeclara->GetEntregaDeclarcao();

$smarty->assign('ENTREGADECL',$entragadeclara->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEntregadeclarcao());
$smarty->assign('PAG_ENTREGADECL', Rotas::pag_Entregadeclarcao());
$smarty->assign('SMS_ERRO', $entragadeclara->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $entragadeclara->GetEntregaDeclarcaoID($id);
    foreach ($entragadeclara->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($entragadeclara->Apaga($id)) {
        $entragadeclara->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $entragadeclara->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Entregadeclarcao());
}

$smarty->assign('SMS_ERRO', $entragadeclara->alert);
$smarty->display('entregadeclarcao.tpl');

?>