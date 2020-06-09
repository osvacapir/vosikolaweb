<?php

$id = 0;
$valores = array();
$smarty = new Template();

$entragadeclara = new EntregaDeclarcao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetEntregadeclarcao());
$smarty->assign('PAG_ENTREGADECL', Rotas::pag_Entregadeclarcao());

$valores = array(

    "Codigo" => '',
    "Codigo_Pedido_Declaracao" => '',
    "Data_Entrega" => '',
    "Codigo_Utilizador" => '',
    "Data_Pedido_Declaracao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Codigo_Pedido_Declaracao" => $_GET['Codigo_Municipio'],
        "Data_Entrega" => $_GET['Data_Entrega'],
        "Codigo_Utilizador" => $_GET['Codigo_Utilizador'],
        "Data_Pedido_Declaracao" => $_GET['Data_Pedido_Declaracao']
    );
    if ($entragadeclara->Grava($valores)) {
        $entragadeclara->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $entragadeclara->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Entregadeclarcao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $entragadeclara->GetEntregaDeclarcaoID($id);
        foreach ($entragadeclara->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $entragadeclara->alert);
$smarty->display('det_entregadeclarcao.tpl');
?>
  