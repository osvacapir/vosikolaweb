<?php

$smarty = new Template();

$entradavalo = new EntradaValor();
$entradavalo->GetEntradaValor();

$smarty->assign('ENTRADAVALOR',$entradavalo->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEntradavalor());
$smarty->assign('PAG_ENTRADAVALOR', Rotas::pag_Entradavalor());
$smarty->assign('SMS_ERRO', $entradavalo->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $entradavalo->GetEntradaValorID($id);
    foreach ($entradavalo->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($entradavalo->Apaga($id)) {
        $entradavalo->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $entradavalo->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Entradavalor());
}

$smarty->assign('SMS_ERRO', $entradavalo->alert);
$smarty->display('entradavalor.tpl');

?>