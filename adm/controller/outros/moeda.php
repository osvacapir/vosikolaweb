<?php

$smarty = new Template();

$moeda = new Moeda();
$moeda->GetMoeda();

$smarty->assign('MOEDA',$moeda->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetMoeda());
$smarty->assign('PAG_MOEDA', Rotas::pag_Moeda());
$smarty->assign('SMS_ERRO', $moeda->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $moeda->GetMoedaID($id);
    foreach ($moeda->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($moeda->Apaga($id)) {
        $moeda->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $moeda->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Moeda());
}

$smarty->assign('SMS_ERRO', $moeda->alert);
$smarty->display('moeda.tpl');

?>