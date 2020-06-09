<?php

$discipli = new Disciplinas();
$id = 0;
$smarty = new Template();


if (isset(Rotas::$pag[1]) && Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
    if ($id > 0) {
        $discipli->GetDisciplinasID($id);
        //  $smarty->display('edit_anolectivo.tpl');
        foreach ($discipli->GetItens()()[1]  as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
} else if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_POST['Codigo'],
        "Designacao" => Sistema::convertText($_POST['Designacao']),
        "Abreviatura" => Sistema::convertText($_POST['Abreviatura'])
    );
    if ($discipli->Grava($valores)) {
        $discipli->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $discipli->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Disciplinas());
}
$smarty->assign('SMS_ERRO', $discipli->alert);
$smarty->assign('CODIGO', $id);
$smarty->display('det_disciplina.tpl');
?>
  