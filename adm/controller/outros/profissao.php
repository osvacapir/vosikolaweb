<?php

$smarty = new Template();

$profissao = new Profissao();
$profissao->GetProfissao();

$smarty->assign('PROFISSAO',$profissao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetProfissao());
$smarty->assign('PAG_PROFISSAO', Rotas::pag_Profissao());
$smarty->assign('SMS_ERRO', $profissao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $profissao->GetProfissaoID($id);
    foreach ($profissao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($profissao->Apaga($id)) {
        $profissao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $profissao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Profissao());
}

$smarty->assign('SMS_ERRO', $profissao->alert);
$smarty->display('profissao.tpl');

?>