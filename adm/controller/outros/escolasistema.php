<?php

$smarty = new Template();

$escolasistem = new TbEscolaSistema();
$escolasistem->GetEscolaSistema();

$smarty->assign('ESCOLASIST',$escolasistem->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEscolaSistema());
$smarty->assign('PAG_ESCOLASIST', Rotas::pag_EscolaSistema());
$smarty->assign('SMS_ERRO', $escolasistem->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $escolasistem->GetEscolaSistemaID($id);
    foreach ($escolasistem->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($escolasistem->Apaga($id)) {
        $escolasistem->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $escolasistem->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_EscolaSistema());
}

$smarty->assign('SMS_ERRO', $escolasistem->alert);
$smarty->display('escolasistema.tpl');

?>