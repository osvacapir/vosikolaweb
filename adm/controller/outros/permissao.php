<?php

$smarty = new Template();

$permissao = new Permissao();
$permissao->GetPermissao();

$smarty->assign('PERMISSAO',$permissao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_Detpermissao());
$smarty->assign('PAG_PERMISSAO', Rotas::pag_permissao());
$smarty->assign('SMS_ERRO', $permissao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $permissao->GetpermissaoID($id);
    foreach ($permissao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($permissao->Apaga($id)) {
        $permissao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $permissao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Permissao());
}

$smarty->assign('SMS_ERRO', $permissao->alert);
$smarty->display('permissao.tpl');

?>