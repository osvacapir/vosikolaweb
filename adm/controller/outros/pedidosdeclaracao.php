<?php

$smarty = new Template();

$pedidosdeclaracao = new PedidosDeclaracao();
$pedidosdeclaracao->GetPedidosDeclaracao();

$smarty->assign('PEDIDOSDECLARACAO',$pedidosdeclaracao->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetPedidosdeclaracao());
$smarty->assign('PAG_PEDIDOSDECLARACAO', Rotas::pag_Pedidosdeclaracao());
$smarty->assign('SMS_ERRO', $pedidosdeclaracao->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $pedidosdeclaracao->GetPedidosDeclaracaoID($id);
    foreach ($pedidosdeclaracao->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($pedidosdeclaracao->Apaga($id)) {
        $pedidosdeclaracao->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $pedidosdeclaracao->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Pedidosdeclaracao());
}

$smarty->assign('SMS_ERRO', $pedidosdeclaracao->alert);
$smarty->display('pedidosdeclaracao.tpl');

?>