<?php

$smarty = new Template();

$irmao = new Irmao();
$irmao->GetIrmao();

$smarty->assign('IRMAO',$irmao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetIrmao());
$smarty->assign('PAG_IRMAO', Rotas::pag_Irmao());
$smarty->assign('SMS_ERRO', $irmao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $irmao->GetIrmaoID($id);
    foreach ($irmao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($irmao->Apaga($id)) {
        $irmao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $irmao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Irmao());
}

$smarty->assign('SMS_ERRO', $irmao->alert);
$smarty->display('irmao.tpl');

?>