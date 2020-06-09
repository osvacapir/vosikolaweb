<?php

$smarty = new Template();

$inscricao = new Inscricao();
$inscricao->GetInscricao();

$smarty->assign('INSCRICAO',$inscricao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetInscricao());
$smarty->assign('PAG_INSCRICAO', Rotas::pag_Inscricao());
$smarty->assign('SMS_ERRO', $inscricao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $inscricao->GetInscricaoID($id);
    foreach ($inscricao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($inscricao->Apaga($id)) {
        $inscricao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $inscricao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Inscricao());
}

$smarty->assign('SMS_ERRO', $inscricao->alert);
$smarty->display('inscricao.tpl');

?>