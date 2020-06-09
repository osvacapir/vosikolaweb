<?php

$smarty = new Template();

$merito = new Merito();
$merito->GetMerito();

$smarty->assign('MERITO',$merito->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetMerito());
$smarty->assign('PAG_MERITO', Rotas::pag_Merito());
$smarty->assign('SMS_ERRO', $merito->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $merito->GetMeritoID($id);
    foreach ($merito->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($merito->Apaga($id)) {
        $merito->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $merito->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Merito());
}

$smarty->assign('SMS_ERRO', $merito->alert);
$smarty->display('merito.tpl');

?>