<?php

$smarty = new Template();
$anulac = new Anulacoes();
$anulac->GetAnulacoes();

$smarty->assign('ANULACOES', $anulac->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetAnulacoes());
$smarty->assign('PAG_ANULA', Rotas::pag_Anulacoes());
$smarty->assign('SMS_ERRO', $anulac->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $anulac->GetAnulacoesID($id);
    foreach ($anulac->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($anulac->Apaga($id)) {
        $anulac->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $anulac->setAlert('Registo não apagado');
    }
}

$smarty->assign('SMS_ERRO', $anulac->alert);
$smarty->display('anulacoes.tpl');

?>