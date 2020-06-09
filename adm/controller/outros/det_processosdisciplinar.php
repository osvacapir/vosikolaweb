<?php

$id = 0;
$valores = array();
$smarty = new Template();

$processosdisciplinar = new ProcessosDisciplinar();
$smarty->assign('PAG_EDIT', Rotas::pag_Detprocessosdisciplinar());
$smarty->assign('PAG_processosdisciplinar', Rotas::pag_processosdisciplinar());

$matric = new Matricula();
$matric->GetMatricula();
$smarty->assign('MATRICUL',$matric->GetItens());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$valores = array(

    "Codigo" => '',
    "Descricao" => '',
    "Codigo_Matricula" => '',
    "Data_Proc_Disc" => '',
    "Codigo_Utilizador" => '',

);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        "Codigo" => $_GET['Codigo'],
        'Descricao' => $_GET['Descricao'],
        'Codigo_Matricula' => $_GET['Codigo_Matricula'],
        'Data_Proc_Disc' => $_GET['Data_Proc_Disc'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador']
    );
    if ($processosdisciplinar->Grava($valores)) {
        $processosdisciplinar->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $processosdisciplinar->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Processosdisciplinar());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $processosdisciplinar->GetProcessosDisciplinarID($id);
        foreach ($processosdisciplinar->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $processosdisciplinar->alert);
$smarty->display('det_processosdisciplinar.tpl');
?>
  