<?php

$id = 0;
$valores = array();
$smarty = new Template();

$professor = new Professor();
$smarty->assign('PAG_EDIT', Rotas::pag_DetProfessor());
$smarty->assign('PAG_PROFESSOR', Rotas::pag_Professor());

$pessoa = new Pessoa();
$pessoa->GetPessoa();
$smarty->assign('PESSOA',$pessoa->GetItens());

$categoriafunc = new CategoriaFunc();
$categoriafunc->GetCategoriaFunc();
$smarty->assign('CATEGORIAFUN',$categoriafunc->GetItens());

$valores = array(

    "Codigo" => '',
    "Nome" => '',
    "Abreviatura" => '',
    "Codigo_Pessoa" => '',
    "Codigo_Categoria" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Nome' => $lista['Nome'],
        'Abreviatura' => $_GET['Abreviatura'],
        'Codigo_Pessoa' => $_GET['Codigo_Pessoa'],
        'Codigo_Categoria' => $_GET['Codigo_Categoria']
    );
    if ($professor->Grava($valores)) {
        $professor->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $professor->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Professor());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $professor->GetProfessorID($id);
        foreach ($professor->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $professor->alert);
$smarty->display('det_professor.tpl');
?>
  