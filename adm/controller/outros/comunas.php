<?php

$smarty = new Template();

$comunas = new Comunas();
$comunas->GetComunas();

$smarty->assign('COMUNAS',$comunas->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetComunas());
$smarty->assign('PAG_COMUNAS', Rotas::pag_Comunas());
$smarty->assign('SMS_ERRO', $comunas->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $comunas->GetComunasID($id);
    foreach ($comunas->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($comunas->Apaga($id)) {
        $comunas->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $comunas->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Comunas());
}

$smarty->assign('SMS_ERRO', $comunas->alert);
$smarty->display('comunas.tpl');

?>