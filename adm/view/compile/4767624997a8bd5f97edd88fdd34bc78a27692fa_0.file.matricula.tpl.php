<?php
/* Smarty version 3.1.36, created on 2020-06-12 14:24:48
  from 'C:\xampp\htdocs\vosikola\adm\view\matricula.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee38220da2959_98184483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4767624997a8bd5f97edd88fdd34bc78a27692fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vosikola\\adm\\view\\matricula.tpl',
      1 => 1591968278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee38220da2959_98184483 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h6 class="h6 mb-0 font-weight-bold text-primary text-gray-800">Matrículas</h6>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatórios</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <?php echo $_smarty_tpl->tpl_vars['SMS_ERRO']->value;?>
 
    <div class="row container-fluid card-header py- align-items-center">
        <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Turma:</label>
            <span class="text-white bold text-center">
                <h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Classe_Designacao'];?>
 
                    <?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Designacao'];?>
</h6>
            </span>        </div>
        <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Sala:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Sala_Designacao'];?>
</h6></div>
        </div>
        <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Período:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Periodo_Designacao'];?>
</h6></div>
        </div>
        <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Curso:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Curso_Abreviatura'];?>
</h6></div>
        </div>
        <div class="col-md-4 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Director da Turma:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Professor_Nome'];?>
</h6></div>
        </div>
        <div class="col-md-1  text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Matriculados:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['QTD_M']->value;?>
</h6></div>
        </div>
        <div class=" col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Vagas:</label>
            <div class="text-black bold text-center"><h6><?php echo $_smarty_tpl->tpl_vars['TURMA']->value[1]['Vaga_Alunos'];?>
</h6></div>
        </div>
    </div>
    <div class="col col-md-offset-12">
    </div>
    <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
    <form class="form" action="" method="POST" enctype="multipart/form-data"> 
        <div class="text-white mt-3">
            <button class="btn btn-success ml-2" type="submit" name="bt_gravar"> Actualizar</button>
            <button class="btn btn-danger ml-2" type="submit" name="bt_apaga_m">Apagar em massa</button>
        </div>
        <div class="card-body">
            <!--div class="table-responsive"-->
            <table class="table-bordered table-striped" id="tabChek" cellspacing="0">
                <thead  class="text-center italic">
                    <tr>
                        <th><input type="checkbox"  id="checkMestre"/> Nº</th>
                        <th>Sexo</th>
                        <th>Nome</th>
                        <th>Data Nasc</th>
                        <th>Idade</th>
                        <th>Líng. Opcional</th>
                        <th>Estado</th>
                        <th>Acção</th>
                    </tr>
                </thead>
                <tfoot class="text-center italic">
                    <tr>
                        <th><span><input type="checkbox"  id="checkMestre"/> Nº</span></th>
                        <th>Sexo</th>
                        <th>Nome</th>
                        <th>Data Nasc</th>
                        <th>Idade</th>
                        <th>Líng. Opcional</th>
                        <th>Estado</th>
                        <th>Acção</th>
                    </tr>
                </tfoot>
                <tbody>    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MATRICULADOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->key => $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
$__foreach_P_0_saved = $_smarty_tpl->tpl_vars['P'];
?>  
                    <a href="#">
                        <input type = "hidden" name = "codigo_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
"/>
                        <tr>
                            <td  class="text-center italic">
                                <?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
  <span><input class="" type = "checkbox" name = "check[]" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
"/>  <?php echo $_smarty_tpl->tpl_vars['P']->key;?>
</span>
                            </td>
                            <td class="text-center italic">
                                <label selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Sexo'];?>
"><?php echo $_smarty_tpl->tpl_vars['P']->value['Sexo'];?>
</label>
                            <!--select name="sexo_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
">
                                <!--option>...</option>
                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Sexo'] == null) {?>
                                <?php }?>
                                <option selected="">M</option>
                                <option selected="">F</option>
                            </select-->
                            </td>
                            <td style="text-align: left;">
                                <label><?php echo $_smarty_tpl->tpl_vars['P']->value['Nome'];?>
</label>
                            </td>
                            <td class="text-center italic">
                                <label><?php echo $_smarty_tpl->tpl_vars['P']->value['DataNascimento'];?>
</label>
                            </td>
                            <td class="text-center italic">
                                <label><?php echo $_smarty_tpl->tpl_vars['P']->value['Idade'];?>
</label>
                            </td>
                            <td>

                                <select name="lingua_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINGUA']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Lingua_Opcao'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Lingua_Opcao'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option> 
                                        <?php }?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                      
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
                                </select>
                            </td>    
                            <td>
                                <select name = "estado_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ESTADO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Estado'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Estado'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>  
                                        <?php }?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>    
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
                                </select>
                            </td>    
                            <td>
                                <a type="button"  href="#" data-toggle="modal" data-target="#apagaModal" class="btn btn-outline-primary"> <i class="fas fa-arr"></i></a>
                                <a type="button" href="<?php echo $_smarty_tpl->tpl_vars['PAG_MATRICULA']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
" class=" btn btn-outline-danger" style="margin-left: 10px"> <i class="fas fa-times fa-"></i></a>
                            </td> 
                        </tr> 
                    </a>

                <?php
$_smarty_tpl->tpl_vars['P'] = $__foreach_P_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                </tbody>
            </table>
            <!--/div-->
        </div>
    </form>
    <?php if (count($_smarty_tpl->tpl_vars['MATRICULADOS']->value) <= $_smarty_tpl->tpl_vars['QTD_V']->value) {?> <?php }?>
   
        <div class="mt-2 border-top">
            <form method="POST" enctype="multipart/form-data">
                <label>Seleccione o ficheiro <a href="#">F_100(baixar)</a></label>
                <input type="file" name="arquivo" required accept=".xls,.xlsx">
                <button class="btn-primary" type="submit" name="buscar">Carregar arquivo</button>
            </form>
             <?php if (count($_smarty_tpl->tpl_vars['DADOS']->value) > 0) {?>
            <form method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    </thead>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DADOS']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->key => $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
$__foreach_P_3_saved = $_smarty_tpl->tpl_vars['P'];
?>  
                        <tr>
                            <td><input  name="Cod_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['NUMERO'];?>
"/></td>
                            <td><input type="text" name="Nome_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['NOME'];?>
"/></td>
                            <td><input type="text" name="Sexo_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['SEXO'];?>
"/></td>
                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['P'] = $__foreach_P_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <input  type="hidden" name="qtd" value="<?php echo count($_smarty_tpl->tpl_vars['DADOS']->value);?>
"/>

                </table>  
                <button class="btn-secondary" type="submit" name="bt_adicionar">Adicionar à turma</button>
            </form>
        </div>
    <?php }?>
</div>
<?php }
}
