<?php

$smarty = new Template();
  $def_esc= new DefEscola();
if (isset(Rotas::$pag[1])) {
    $id = Rotas::$pag[1];
} else {
    $id = 0;
}

$senha = 0;
$count = 0;
$tipoUser = 0;
$texto = "";
$tabelaEscol = '';
if (isset($_POST['btGravar'])) {
    $valores = array(
        'Codigo' => $_POST['Codigo'],
        'Codigo_Ano_Lectivo' => $_SESSION['SYS']['CodAno'],
        'Codigo_Escola' => $_SESSION['SYS']['CodEscola'],
        'Num_Turmas' => $_POST['Num_Turmas']
    );
    if ($def_esc->Grava($valores)) {

        $def_esc->setAlert(' REGISTOS GRAVADOS!<br>', 2);
    } else {
        $def_esc->setAlert('NENHUM REGISTO GRAVADO!');
    }
    Rotas::Redirecionar(1, Rotas::pag_DefEscola());
} else {
    if ($id > 0) {
        $id = Rotas::$pag[1];
        $def_esc->GetDefEscola();
        foreach ($def_esc->GetItens()[1] as $campo => $valor) {
            $smarty->assign(strtoupper($campo), $valor);
        }
    } else {
        $id = 0;
    }
    // var_dump($def_esc->GetItens());
}

$smarty->assign('COD', $id);
$smarty->assign('SMS_ERRO', $def_esc->alert);
$smarty->assign('DEF', $def_esc->GetItens());

$smarty->display('def_escola.tpl');
?>
  