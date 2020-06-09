<?php

$smarty = new Template();
$pessoa = new Pessoa();
$pessoa->GetPessoa();

$smarty->assign('PESSOA', $pessoa->GetItens());
$smarty->assign('PAG_EDIT_PESS', Rotas::pag_DetPessoa());
$smarty->assign('PAG_PESSOA', Rotas::pag_Pessoa());


if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $pessoa->GetPessoaID($id);
    foreach ($pessoa->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($pessoa->Apaga($id)) {
        $pessoa->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $pessoa->setAlert('Registo não apagado');
    }
}

$smarty->assign('SMS_ERRO', $pessoa->alert);
$smarty->display('pessoa.tpl');

?>
  