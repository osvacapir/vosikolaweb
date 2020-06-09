<?php

$smarty = new Template();
$classe = new AnoLectivo();

$smarty->assign('PAG_EDIT', Rotas::pag_DetAnoLectivo());
$smarty->assign('PAG_ANO_L', Rotas::pag_AnoLectivo());
$codigo = 0;
if (isset($_POST['bt_grava'])) {
    echo 'CLICOU';
    $valores = array();
    $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : $codigo;
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $_POST['Designacao'],
        "Codigo_Estado" => $_POST['Codigo_Estado']
    );
    if ($classe->Grava($valores)) {
        $classe->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $classe->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_AnoLectivo());
} else {
    $id = 0;
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $classe->GetAnoLectivoID($id);
        foreach ($classe->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        //  $smarty->display('edit_anolectivo.tpl');
    } else {
        
    }
    $smarty->assign('COD', $id);
    $smarty->assign('SMS_ERRO', $classe->alert);
    $smarty->display('det_anolectivo.tpl');
}
?>
  