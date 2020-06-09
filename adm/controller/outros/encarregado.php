<?php

$smarty = new Template();

$encarregad = new Encarregado();
$encarregad->GetEncarregado();

$smarty->assign('ENCARREGAD',$encarregad->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetEncarregado());
$smarty->assign('PAG_ENCARREGAD', Rotas::pag_Encarregado());
$smarty->assign('SMS_ERRO', $encarregad->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $encarregad->GetEncarregadoID($id);
    foreach ($encarregad->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($encarregad->Apaga($id)) {
        $encarregad->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $encarregad->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Encarregado());
}

$smarty->assign('SMS_ERRO', $encarregad->alert);
$smarty->display('encarregado.tpl');

?>