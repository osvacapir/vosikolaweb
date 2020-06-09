<?php

$smarty = new Template();

$professor = new Professor();
$professor->GetProfessor();

$smarty->assign('PROFESSOR',$professor->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetProfessor());
$smarty->assign('PAG_PROFESSOR', Rotas::pag_Professor());
$smarty->assign('SMS_ERRO', $professor->alert); 

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
    if ($professor->Apaga($id)) {
        $professor->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $professor->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Professor());
}

$smarty->assign('SMS_ERRO', $professor->alert);
$smarty->display('professor.tpl');

?>