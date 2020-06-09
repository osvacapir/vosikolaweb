<?php

$smarty = new Template();
$classe = new AnoLectivo();
$estado = new Estado();
$id = 0;
//var_dump($smarty->getTemplateVars());

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
    if ($id > 0) {
        $classe->GetAnoLectivoID($id);
        foreach ($classe->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
} if (isset($_POST['bt_gravar'])) {
//variaveis
    $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : $id;
    $designacao = $_POST['Designacao'];
    $stdo = $_POST['Codigo_Estado'];

    $classe->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao,
        "Codigo_Estado" => $stdo
    );
    if ($classe->Grava($valores)) {
        $classe->setAlert('REGISTO GRAVADO!', 2);
        Rotas::Redirecionar(1, Rotas::pag_AnoLectivo());
    } else {
        $classe->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $ano->alert;
} elseif (isset($_POST['bt_apagar'])) {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
        if ($id > 0) {
            $id = Rotas::$pag[1];
            $classe->GetAnoLectivoID($id);

            if ($classe->Apaga($id)) {
                $classe->setAlert('Registo Apagado com sucesso', 2);
            } else {
                $classe->setAlert('Registo não apagado');
            }
        } else {
            $id = 0;
        }
    }
}
$classe->GetAnoLectivos();
$estado->GetEstado();
$smarty->assign('ESTADO', $estado->GetItens());
$smarty->assign('ANO_L', $classe->GetItens());

$smarty->assign('PAG_ANO_L', Rotas::pag_AnoLectivo());



$smarty->assign('CODIDO', $id);
$smarty->assign('SMS_ERRO', $classe->alert);
$smarty->assign('PAGINAS', $classe->ShowPaginacao());
$smarty->display('anolectivo.tpl');
?>
  