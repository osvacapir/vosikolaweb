<?php

$id = 0;
$valores = array();
$smarty = new Template();

$irmao = new Irmao();
$smarty->assign('PAG_EDIT', Rotas::pag_DetIrmao());
$smarty->assign('PAG_IRMAO', Rotas::pag_Irmao());

$valores = array(
    "Codigo" => '',
    "Aluno1" => '',
    "Aluno2" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        "Aluno1" => $_GET['Aluno1'],
        "Aluno2" => $_GET['Aluno2']
    );
    if ($irmao->Grava($valores)) {
        $irmao->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $irmao->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Irmao());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $irmao->GetIrmaoID($id);
        foreach ($irmao->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $irmao->alert);
$smarty->display('det_irmao.tpl');
?>
  