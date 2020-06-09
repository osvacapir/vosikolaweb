<?php

$id = 0;
$valores = array();
$smarty = new Template();

$nota = new Nota();
$smarty->assign('PAG_EDIT', Rotas::pag_DetNota());
$smarty->assign('PAG_NOTA', Rotas::pag_Nota());

$matric = new Matricula();
$matric->GetMatricula();
$smarty->assign('MATRICUL',$matric->GetItens());

$disciplin = new Disciplinas();
$disciplin->GetDisciplinas();
$smarty->assign('DISCIPLIN',$disciplin->GetItens());

$tipoavaliac = new TipoAvaliacao();
$tipoavaliac->GetTipoAvaliacao();
$smarty->assign('TIPOAVALIAC',$tipoavaliac->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "CodigoMatricula" => '',
    "Nota" => '',
    "CodigoDisciplina" => '',
    "DataCadastro" => '',
    "CodigoTrimestre" => '',
    "CodigoTipoAvaliacao" => '',
    "CodigoUtilizador" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'CodigoMatricula' => $_GET['CodigoMatricula'],
        'Nota' => $lista['Nota'],
        'CodigoDisciplina' => $_GET['CodigoDisciplina'],
        'DataCadastro' => $_GET['DataCadastro'],
        'CodigoTrimestre' => $_GET['CodigoTrimestre'],
        'CodigoTipoAvaliacao' => $_GET['CodigoTipoAvaliacao'],
        'CodigoUtilizador' => $_GET['CodigoUtilizador']
    );
    if ($nota->Grava($valores)) {
        $nota->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $nota->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Nota());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $nota->GetNotaID($id);
        foreach ($nota->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $nota->alert);
$smarty->display('det_nota.tpl');
?>
  