<?php

$smarty = new Template();

$motivoanulac = new MotivosAnulacao();
$motivoanulac->GetMotivosAnulacao();

$smarty->assign('MOTIVOANUL',$motivoanulac->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetMotivosanulacao());
$smarty->assign('PAG_MOTIVOANUL', Rotas::pag_Motivosanulacao());
$smarty->assign('SMS_ERRO', $motivoanulac->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $motivoanulac->GetMotivosAnulacaoID($id);
    foreach ($motivoanulac->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($motivoanulac->Apaga($id)) {
        $motivoanulac->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $motivoanulac->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Motivosanulacao());
}

$smarty->assign('SMS_ERRO', $motivoanulac->alert);
$smarty->display('motivosanulacao.tpl');

?>