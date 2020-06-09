<?php

$smarty = new Template();
$classe = new Classe();
$id = 0;
//var_dump($smarty->getTemplateVars());
$smarty->assign('DESIGNACAO', "");
if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
    if ($id > 0) {
        $classe->GetClasseID($id);
        foreach ($classe->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
} if (isset($_POST['bt_gravar'])) {
//variaveis
    $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : $id;
    $designacao = $_POST['Designacao'];

    $classe->Preparar($codigo, $designacao);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao
    );
    if ($classe->Grava($valores)) {
        $classe->setAlert('REGISTO GRAVADO!', 2);
        Rotas::Redirecionar(1, Rotas::pag_Classe());
    } else {
        $classe->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $ano->alert;
} elseif (isset($_POST['bt_apagar'])) {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
        if ($id > 0) {
            $id = Rotas::$pag[1];
            $classe->GetClasseID($id);
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
$classe->GetClasse();
$smarty->assign('CLASSES', $classe->GetItens());

$smarty->assign('PAG_CLASSE', Rotas::pag_Classe());

$smarty->assign('CODIDO', $id);
$smarty->assign('SMS_ERRO', $classe->alert);
$smarty->assign('PAGINAS', $classe->ShowPaginacao());
$smarty->display('classe.tpl');
?>
  