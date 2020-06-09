<?php

$smarty = new Template();
$def_esc = new DefEscola();
if (isset(Rotas::$pag[1]) && Rotas::$pag[1] > 0) {
    $id = Rotas::$pag[1];
    $def_esc->GetDefEscolaID();
    foreach ($def_esc->GetItens()[1] as $campo => $valor) {
        $smarty->assign(strtoupper($campo), $valor);
    }
    if (isset($_POST['bt_gravar'])) {
        $valores = array(
            'Codigo' => $_POST['Codigo'],
            'Codigo_Ano_Lectivo' => $_SESSION['SYS']['CodAno'],
            'Codigo_Escola' => $_SESSION['SYS']['CodEscola'],
            'Num_Turmas' => $_POST['Num_Turmas']
        );
        if ($def_esc->Grava($valores)) {
            
            $def_esc->setAlert(' REGISTOS GRAVADOS!<br>', 2);
            unset($_POST);
             Rotas::Redirecionar(0, Rotas::pag_DefEscola());
        } else {
            $def_esc->setAlert('NENHUM REGISTO GRAVADO!');
        }    } else {
        $def_esc->setAlert('Escola não cadastrada!');
    }  // var_dump($def_esc->GetItens());
}


$smarty->assign('SMS_ERRO', $def_esc->alert);
$smarty->assign('DEF', $def_esc->GetItens());

$smarty->display('def_escola.tpl');
?>
  