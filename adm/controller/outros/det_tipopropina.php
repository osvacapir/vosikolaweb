<?php

$id = 0;
$valores = array();
$smarty = new Template();

$tipopropina = new TipoPropina();
$smarty->assign('PAG_EDIT', Rotas::pag_DetTipopropina());
$smarty->assign('PAG_TIPOPROPINA', Rotas::pag_Tipopropina());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$turma = new Turma();
$turma->GetTurma();
$smarty->assign('TURMA',$turma->GetItens());

$valores = array(

    "Codigo" => '',
    "Designacao" => '',
    "Valor" => '',
    "Codigo_Utilizador" => '',
    "Moeda" => '',
    "Codigo_Turma" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Designacao' => $_GET['Designacao'],
        'Valor' => $_GET['Valor'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador'],
        'Moeda' => $_GET['Moeda'],
        'Codigo_Turma' => $_GET['Codigo_Turma']
    );
    if ($tipopropina->Grava($valores)) {
        $tipopropina->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $tipopropina->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Tipopropina());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $tipopropina->GetTipoPropinaID($id);
        foreach ($tipopropina->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $tipopropina->alert);
$smarty->display('det_tipopropina.tpl');
?>
  