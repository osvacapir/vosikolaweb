<?php

$smarty = new Template();

$nota = new Nota();
$nota->GetNota();

$smarty->assign('NOTA',$nota->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetNota());
$smarty->assign('PAG_NOTA', Rotas::pag_Nota());
$smarty->assign('SMS_ERRO', $nota->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $nota->GetNotaID($id);
    foreach ($nota->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($nota->Apaga($id)) {
        $nota->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $nota->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Nota());
}

$smarty->assign('SMS_ERRO', $nota->alert);
$smarty->display('nota.tpl');

?>