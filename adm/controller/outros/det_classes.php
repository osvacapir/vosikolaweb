<?php

$id = 0;
$valores = array();
$smarty=new Template();
$clas=new Classe();

$smarty->assign('PAG_EDIT', Rotas::pag_DetClasses());
$smarty->assign('PAG_CLASSE', Rotas::pag_Classes());

$valores = array(
    "Codigo" => '',
    "Designacao" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Designacao" => $_GET['Designacao']
    );
    if ($clas->Grava($valores)) {
        $clas->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $clas->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Classes());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $clas->GetClassesID($id);
        foreach ($clas->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }
    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $clas->alert);
$smarty->display('det_classes.tpl');
?>
  