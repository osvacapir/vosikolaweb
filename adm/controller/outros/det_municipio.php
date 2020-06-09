<?php

$id = 0;
$valores = array();
$smarty = new Template();

$municipio = new Municipio();
$smarty->assign('PAG_EDIT', Rotas::pag_DetMunicipio());
$smarty->assign('PAG_MUNICIPIO', Rotas::pag_Municipio());

$provincia = new Provincia();
$provincia->GetProvincia();
$smarty->assign('PROVINCIA',$provincia->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Provincia" => '',
    "Designacao" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Codigo_Provincia" => $_GET['Codigo_Provincia'],
        "Designacao" => $_GET['Designacao']
    );
    if ($municipio->Grava($valores)) {
        $municipio->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $municipio->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Municipio());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $municipio->GetMunicipioID($id);
        foreach ($municipio->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $municipio->alert);
$smarty->display('det_municipio.tpl');
?>
  