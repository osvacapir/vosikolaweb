<?php

$smarty = new Template();

$linguaopc = new LinguaOpcao();
$linguaopc->GetLinguaOpcao();

$smarty->assign('LINGUAOP',$linguaopc->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetLinguaopcao());
$smarty->assign('PAG_LINGUAOP', Rotas::pag_Linguaopcao());
$smarty->assign('SMS_ERRO', $linguaopc->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $linguaopc->GetLinguaOpcaoID($id);
    foreach ($linguaopc->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($linguaopc->Apaga($id)) {
        $linguaopc->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $linguaopc->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Linguaopcao());
}

$smarty->assign('SMS_ERRO', $linguaopc->alert);
$smarty->display('linguaopcao.tpl');

?>