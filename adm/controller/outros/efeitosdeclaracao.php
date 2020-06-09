<?php

$smarty = new Template();

$efeitodecla = new EfeitosDeclaracao();
$efeitodecla->GetEfeitosDeclaracao();

$smarty->assign('EFEITODECLA',$efeitodecla->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEfeitosDeclaracao());
$smarty->assign('PAG_EFEITODECLA', Rotas::pag_EfeitosDeclaracao());
$smarty->assign('SMS_ERRO', $efeitodecla->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $efeitodecla->GetEfeitosDeclaracaoID($id);
    foreach ($efeitodecla->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($efeitodecla->Apaga($id)) {
        $efeitodecla->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $efeitodecla->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_EfeitosDeclaracao());
}

$smarty->assign('SMS_ERRO', $efeitodecla->alert);
$smarty->display('efeitosdeclaracao.tpl');

?>