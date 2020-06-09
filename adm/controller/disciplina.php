<?php

$smarty = new Template();
$disciplina = new Disciplinas();

//var_dump($smarty->getTemplateVars());
$disciplina->GetDisciplinas();
$codigo = 0;
$smarty->assign('DESIGNACAO', '');
$smarty->assign('ABREVIATURA', '');
if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
    if ($id > 0) {
        $disciplina->GetDisciplinasID($id);
        foreach ($disciplina->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : 0;
    }
}
if (isset($_POST['bt_gravar'])) {
//variaveis
    $designacao = $_POST['Designacao'];
    $abreviatura = $_POST['Abreviatura'];

    //$disciplina->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao,
        "Abreviatura" => $abreviatura
    );
    if ($disciplina->Grava($valores)) {
        $disciplina->setAlert('REGISTO GRAVADO!', 2);
        Rotas::Redirecionar(1, Rotas::pag_Disciplinas());
    } else {
        $disciplina->setAlert('REGISTO NÃO GRAVADO!<br> Talvez já exista uma Disciplina com o Nome {' . $designacao . '}');
    }
    //echo '' . $disciplina->alert;
} else if (isset($_POST['bt_altera'])) {
    if (isset($_POST['codigo']) && $_POST['codigo'] > 0)
        Rotas::Redirecionar(0, Rotas::pag_Disciplinas() . '/' . $_POST['codigo']);
//variaveis
}

$smarty->assign('DISCIPLINAS', $disciplina->GetItens());

$smarty->assign('PAG_DISCIPLINA', Rotas::pag_Disciplinas());



$smarty->assign('CODIDO', $codigo);
$smarty->assign('SMS_ERRO', $disciplina->alert);
$smarty->assign('PAGINAS', $disciplina->ShowPaginacao());
$smarty->display('disciplina.tpl');
