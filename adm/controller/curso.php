<?php

$smarty = new Template();
$curso = new Cursos();
$estado = new Estado();

//var_dump($smarty->getTemplateVars());
$curso->GetCursos();
$codigo = 0;
$smarty->assign('DESIGNACAO', '');
$smarty->assign('ABREVIATURA', '');
$smarty->assign('CODIGO_ESTADO', '');

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
    if ($id > 0) {
        $curso->GetCursosID($id);
        foreach ($curso->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
        $codigo = isset($_POST['Codigo']) && $_POST['Codigo'] > 0 ? $_POST['Codigo'] : 0;
    }
}
if (isset($_POST['bt_gravar'])) {
//variaveis

    $designacao = $_POST['Designacao'];
    $abreviatura = $_POST['Abreviatura'];
    $stdo = $_POST['Codigo_Estado'];

    //$curso->Preparar($codigo, $designacao, $stdo);
    $valores = array(
        "Codigo" => $codigo,
        "Designacao" => $designacao,
        "Abreviatura" => $abreviatura,
        "Codigo_Estado" => $stdo
    );
    if ($curso->Grava($valores)) {
        $curso->setAlert('REGISTO GRAVADO!', 2);
        unset($_POST);
        Rotas::Redirecionar(0, Rotas::pag_Curso());
    } else {
        $curso->setAlert('REGISTO NÃO GRAVADO!');
    }
    //echo '' . $curso->alert;
} else if (isset($_POST['bt_altera'])) {
    if (isset($_POST['codigo']) && $_POST['codigo'] > 0)
        Rotas::Redirecionar(0, Rotas::pag_Curso() . '/' . $_POST['codigo']);
//variaveis
}

$estado->GetEstado();
$smarty->assign('ESTADO', $estado->GetItens());
$smarty->assign('CURSOS', $curso->GetItens());

$smarty->assign('PAG_ANO_L', Rotas::pag_Curso());



$smarty->assign('CODIDO', $codigo);
$smarty->assign('SMS_ERRO', $curso->alert);
$smarty->assign('PAGINAS', $curso->ShowPaginacao());
$smarty->display('curso.tpl');
