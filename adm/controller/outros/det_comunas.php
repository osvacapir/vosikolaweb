<?php

$id = 0;
$valores = array();
$smarty = new Template();

$comunas = new Comunas();
$smarty->assign('PAG_EDIT', Rotas::pag_DetComunas());
$smarty->assign('PAG_COMUNAS', Rotas::pag_Comunas());

$munic = new Municipio();
$munic->GetMunicipio();
$smarty->assign('MUNICIO',$munic->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Municipio" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Codigo_Municipio" => $_GET['Codigo_Municipio'],
        "Designacao" => $_GET['Designacao']
    );
    if ($comunas->Grava($valores)) {
        $comunas->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $comunas->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Comunas());
} else {
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

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $comunas->alert);
$smarty->display('det_comunas.tpl');
?>
  