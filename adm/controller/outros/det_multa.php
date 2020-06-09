<?php

$id = 0;
$valores = array();
$smarty = new Template();

$multa = new Multa();
$smarty->assign('PAG_EDIT', Rotas::pag_DetMulta());
$smarty->assign('PAG_MULTA', Rotas::pag_Multa());

$tipomulta = new TipoMulta();
$tipomulta->GetTipoMulta();
$smarty->assign('TIPOMULTA',$tipomulta->GetItens());


$valores = array(

    "Codigo" => '',
    "Dia_Inicio" => '',
    "Dia_Fim" => '',
    "Percentagem" => '',
    "Codigo_Tipo_Multa" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Dia_Inicio' => $_GET['Dia_Inicio'],
        'Dia_Fim' => $_GET['Dia_Fim'],
        'Percentagem' => $_GET['Percentagem'],
        'Codigo_Tipo_Multa' => $_GET['Codigo_Tipo_Multa']
    );
    if ($multa->Grava($valores)) {
        $multa->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $multa->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Multa());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $multa->GetMultaID($id);
        foreach ($multa->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $multa->alert);
$smarty->display('det_multa.tpl');
?>
  