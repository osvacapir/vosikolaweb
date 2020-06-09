<?php

$smarty = new Template();

$faltas = new Faltas();
$faltas->GetFaltas();

$smarty->assign('FALTAS',$faltas->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetFaltas());
$smarty->assign('PAG_FALTAS', Rotas::pag_Faltas());
$smarty->assign('SMS_ERRO', $faltas->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $faltas->GetFaltasID($id);
    foreach ($faltas->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($faltas->Apaga($id)) {
        $faltas->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $faltas->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Faltas());
}

$smarty->assign('SMS_ERRO', $faltas->alert);
$smarty->display('faltas.tpl');

?>