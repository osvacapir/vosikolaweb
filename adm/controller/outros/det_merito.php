<?php

$id = 0;
$valores = array();
$smarty = new Template();

$merito = new Merito();
$smarty->assign('PAG_EDIT', Rotas::pag_DetMerito());
$smarty->assign('PAG_MERITO', Rotas::pag_Merito());

$usuario = new Usuario();
$usuario->GetUsuario();
$smarty->assign('USUARIO',$usuario->GetItens());

$matricula = new Matricula();
$matricula->GetMatricula();
$smarty->assign('MATRICULA',$matricula->GetItens());

$valores = array(
    "Codigo" => '',
    "Descricao" => '',
    "Data_Merito" => '',
    "Codigo_Matricula" => '',
    "Codigo_Utilizador" => '',
);

if (isset($_REQUEST['btGravar'])) {
    $valores = array(
        'Codigo' => $_GET['Codigo'],
        'Descricao' => $_GET['Descricao'],
        'Data_Merito' => $_GET['Data_Merito'],
        'Codigo_Matricula' => $_GET['Codigo_Matricula'],
        'Codigo_Utilizador' => $_GET['Codigo_Utilizador']
    );
    if ($merito->Grava($valores)) {
        $merito->setAlert('REGISTO GRAVADO!', 2);
    } else {
        $merito->setAlert('REGISTO NÃO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_Merito());
} else {
    if (isset(Rotas::$pag[1])) {
        $id = Rotas::$pag[1];
    } else {
        $id = 0;
    }
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $merito->GetMeritoID($id);
        foreach ($merito->GetItens()[1] as $campo => $valor) {

            $smarty->assign(strtoupper($campo), $valor);
        }

    } else {
        foreach ($valores as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    }
}
$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $merito->alert);
$smarty->display('det_merito.tpl');
?>
  