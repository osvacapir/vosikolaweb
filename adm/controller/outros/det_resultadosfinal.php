<?php

$id = 0;
$valores = array();
$smarty = new Template();

$resultadosfinal = new ResultadosFinal();
$smarty->assign('PAG_EDIT', Rotas::pag_DetResultadosfinal());
$smarty->assign('PAG_RESULTADOFIN', Rotas::pag_Resultadosfinal());

$matricula = new Matricula();
$matricula->GetMatricula();
$smarty->assign('MATRICULA',$matricula->GetItens());

$disciplin = new Disciplinas();
$disciplin->GetDisciplinas();
$smarty->assign('DISCIPLIN',$disciplin->GetItens());

$classificac = new TbClassificacaoFinal();
$classificac->GetClassificacao_final();
$smarty->assign('CLASSIFICAC',$classificac->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Codigo_Confirmacao" => '',
    "Codigo_Disciplina" => '',
    "Media_Final" => '',
    "Codigo_Classificacao_Final" => '',
    "Codigo_Utilizador" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Codigo_Confirmacao' => $_GET['Codigo_Confirmacao'],
        'Codigo_Disciplina' => $_GET['Codigo_Disciplina'],
        'Media_Final' => $_GET['Media_Final'],
        'Codigo_Classificacao_Final' => $_GET['Codigo_Classificacao_Final'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador']
    );
    if ($resultadosfinal->Grava($valores)) {
        $resultadosfinal->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $resultadosfinal->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Resultadosfinal());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $resultadosfinal->GetResultadosFinalID($id);
        foreach ($resultadosfinal->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $resultadosfinal->alert);
$smarty->display('det_resultadosfinal.tpl');
?>
  