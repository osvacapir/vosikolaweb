<?php

$smarty = new Template();

$processosdisciplinar = new ProcessosDisciplinar();
$processosdisciplinar->GetProcessosDisciplinar();

$smarty->assign('PROCESSOSDISC',$processosdisciplinar->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetProcessosdisciplinar());
$smarty->assign('PAG_PROCESSOSDISC', Rotas::pag_Processosdisciplinar());
$smarty->assign('SMS_ERRO', $processosdisciplinar->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $processosdisciplinar->GetProcessosDisciplinarID($id);
    foreach ($processosdisciplinar->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($processosdisciplinar->Apaga($id)) {
        $processosdisciplinar->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $processosdisciplinar->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Processosdisciplinar());
}

$smarty->assign('SMS_ERRO', $processosdisciplinar->alert);
$smarty->display('processosdisciplinar.tpl');

?>