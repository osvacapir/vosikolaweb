<?php

$id = 0;
$valores = array();
$smarty = new Template();

$faltas = new Faltas();
$smarty->assign('PAG_EDIT', Rotas::pag_DetFaltas());
$smarty->assign('PAG_FALTAS', Rotas::pag_Faltas());

$discipli = new Disciplinas();
$discipli->GetDisciplinas();
$smarty->assign('DISCIPLI',$discipli->GetItens());

$matric = new Matricula();
$matric->GetMatricula();
$smarty->assign('MATRICUL',$matric->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARI',$usuario->GetItens());

$valores = array(

    'Codigo' => '',
    'nFaltas' => '',
    'Codigo_Matricula' => '',
    'Codigo_Disciplina' => '',
    'Codigo_Utilizadores' => '',
    'dataFalta' => '',
    'Descricao' => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'nFaltas' => $_GET['nFaltas'],
        'Codigo_Matricula' => $_GET['Codigo_Matricula'],
        'Codigo_Disciplina' => $_GET['Codigo_Disciplina'],
        'Codigo_Utilizadores' => $_GET['Codigo_Utilizadores'],
        'dataFalta' => $_GET['dataFalta'],
        'Descricao' => $_GET['Descricao']
    );
    if ($faltas->Grava($valores)) {
        $faltas->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $faltas->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Faltas());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $faltas->GetFaltasID($id);
        foreach ($faltas->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $faltas->alert);
$smarty->display('det_faltas.tpl');
?>
  