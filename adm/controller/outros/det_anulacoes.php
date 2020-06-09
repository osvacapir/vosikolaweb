<?php

$id = 0;
$valores = array();
$smarty = new Template();
$anulac = new Anulacoes();

$smarty->assign('PAG_EDIT', Rotas::pag_DetAnulacoes());
$smarty->assign('PAG_ANULA', Rotas::pag_Anulacoes());

$valores = array(

    "Codigo" => '',
    "Data_Anulacao" => '',
    "Codigo_Matricula" => '',
    "Codigo_Motivo_Anulacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Data_Anulacao" => $_GET['Data_Anulacao'],
        "Codigo_Matricula" => $_GET['Codigo_Matricula'],
        "Codigo_Motivo_Anulacao" => $_GET['Codigo_Motivo_Anulacao']
    );
    if ($anulac->Grava($valores)) {
        $anulac->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $anulac->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Anulacoes());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $anulac->GetAnulacoesID($id);
        foreach ($anulac->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $anulac->alert);
$smarty->display('det_anulacoes.tpl');
?>
  