<?php

$smarty = new Template();

$resultadosfinal = new ResultadosFinal();
$resultadosfinal->GetResultadosFinal();

$smarty->assign('RESULTADOFIN',$resultadosfinal->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetResultadosfinal());
$smarty->assign('PAG_RESULTADOFIN', Rotas::pag_Resultadosfinal());
$smarty->assign('SMS_ERRO', $resultadosfinal->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $resultadosfinal->GetResultadosFinalID($id);
    foreach ($resultadosfinal->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($resultadosfinal->Apaga($id)) {
        $resultadosfinal->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $resultadosfinal->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Resultadosfinal());
}

$smarty->assign('SMS_ERRO', $resultadosfinal->alert);
$smarty->display('resultadosfinal.tpl');

?>