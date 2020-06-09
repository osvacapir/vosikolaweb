<?php

$smarty = new Template();

$pagamento = new Pagamento();
$pagamento->GetPagamento();

$smarty->assign('PAGAMENTO',$pagamento->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPagamento());
$smarty->assign('PAG_PAGAMENTO', Rotas::pag_Pagamento());
$smarty->assign('SMS_ERRO', $pagamento->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $pagamento->GetPagamentoID($id);
    foreach ($pagamento->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($pagamento->Apaga($id)) {
        $pagamento->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $pagamento->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Pagamento());
}

$smarty->assign('SMS_ERRO', $pagamento->alert);
$smarty->display('pagamento.tpl');

?>