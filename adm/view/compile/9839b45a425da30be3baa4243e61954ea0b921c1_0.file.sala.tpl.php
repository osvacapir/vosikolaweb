<?php
/* Smarty version 3.1.36, created on 2020-06-11 16:10:40
  from 'C:\xampp\htdocs\vosikola\adm\view\sala.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee2497090c8b7_96754342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9839b45a425da30be3baa4243e61954ea0b921c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vosikola\\adm\\view\\sala.tpl',
      1 => 1591633822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee2497090c8b7_96754342 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Salas</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="card-header py-3">
    <form name="cadcliente" class="form-inline"  method="post" action="" id="form_meu">
        <div class="row">

            <input required class="form-control ml-1 text-uppercase" type="text" name="Designacao" value="<?php echo $_smarty_tpl->tpl_vars['DESIGNACAO']->value;?>
" placeholder="Designação"/>  
            <input type="hidden" name="Codigo" value="<?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
" class="form-control" required>
            <button type="submit" class="btn btn-success ml-1" name="bt_gravar"> <i class="fas fa-plus"></i> Adicionar </button>
        </div>

    </form>
    <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
</div>



<!-- DataTales Example -->
<?php echo $_smarty_tpl->tpl_vars['SMS_ERRO']->value;?>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table-bordered table-striped" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Designação</th>
                        <th>Acção</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo</th>
                        <th>Designação</th>
                        <th>Acção</th>
                    </tr>
                </tfoot>
                <tbody>                  
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SALA']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?>
                    <form name="period_Editar" method="post" action="">    
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['P']->value['Designacao'];?>
</td>    
                            <td>
                                <input type="hidden" name="codigo" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
">
                                <button name="bt_altera"  class=" btn btn-outline-success" > <i class="fas fa-pencil-square"></i></button>                            </td> 
                        </tr>      
                    </form>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>        
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php }
}
