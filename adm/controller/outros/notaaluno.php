<?php

$smarty = new Template();

$notaaluno = new NotaAluno();
$notaaluno->GetNotaAluno();

$smarty->assign('NOTAALUNO',$notaaluno->GetItens());
$smarty->assign('PAG_EDIT', Rotas::pag_DetNotaaluno());
$smarty->assign('PAG_NOTAALUNO', Rotas::pag_Notaaluno());
$smarty->assign('SMS_ERRO', $notaaluno->alert); 

if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}
if ($id > 0) {
    $id = Rotas::$pag[1];
    $notaaluno->GetNotaAlunoID($id);
    foreach ($notaaluno->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if ($notaaluno->Apaga($id)) {
        $notaaluno->setAlert('Registo Apagado com sucesso', 2);
    } else {
        $notaaluno->setAlert('Registo não apagado');
    }
    Rotas::Redirecionar(1, Rotas::pag_Notaaluno());
}

$smarty->assign('SMS_ERRO', $notaaluno->alert);
$smarty->display('notaaluno.tpl');

?>