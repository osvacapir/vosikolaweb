<?php

$smarty = new Template();

$subsistema = new Subsistema();
$subsistema->GetSubsistema();

$smarty->assign('SUBSISTEMA', $subsistema->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_Subsistema());
$smarty->assign('PAG_SUBSISTEMA', Rotas::pag_Subsistema());

if (isset(Rotas::$pag[1]) && Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
    $subsistema->GetSubsistemaID($id);
    foreach ($subsistema->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if (isset($_POST['bt_apaga'])) {
        if ($subsistema->Apaga($id)) {
            $subsistema->setAlert('Registo Apagado com sucesso', 2);
            Rotas::Redirecionar(1, Rotas::pag_Subsistema());
        } else {
            $subsistema->setAlert('Registo não apagado');
        }
    }
} else {
    $smarty->assign('DESIGNACAO', "");
}

if (isset($_POST['bt_grava'])) {
    $designacao = isset($_POST['Designacao']) ? $_POST['Designacao'] : "";
    $codigo = isset($_POST['Codigo']) ? $_POST['Codigo'] : 0;

    //$curso->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao
    );
    if ($subsistema->Grava($valores)) {
        $subsistema->setAlert('Registo inserido com sucesso', 2);
        Rotas::Redirecionar(1, Rotas::pag_Subsistema());
    } else {
        $subsistema->setAlert('Registo não insrido');
    }
}

$smarty->assign('SMS_ERRO', $subsistema->alert);
$smarty->display('subsistema.tpl');
?>