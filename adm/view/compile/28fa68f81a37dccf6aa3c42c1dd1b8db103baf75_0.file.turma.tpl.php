<?php
/* Smarty version 3.1.36, created on 2020-06-09 12:25:13
  from 'C:\xampp\htdocs\vosikola\adm\view\turma.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5edf7199630863_30961335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28fa68f81a37dccf6aa3c42c1dd1b8db103baf75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vosikola\\adm\\view\\turma.tpl',
      1 => 1590942624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edf7199630863_30961335 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\vosikola\\lib\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h6 mb-0 font-weight-bold text-primary text-gray-800">Turma</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatórios</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form class="form" action="" method="POST"> 
        <div class="card-header py-2">
            <?php echo $_smarty_tpl->tpl_vars['SMS_ERRO']->value;?>
 

            <div class="col-md-auto">
                <span> 
                    <button class="btn btn-outline-primary ml-2" name="bt_grava" id="btGravar" type="submit"> Gravar Alterações</button>
                    <button class="btn btn-outline-danger ml-2" name="bt_apaga_maassa" type="submit"> Apagar </button>
                    <span class="text te"><b><?php echo $_smarty_tpl->tpl_vars['QTD_T']->value;?>
</b></span> (<i>turmas registadas</i>)
                </span>
            </div>
            <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table-bordered table-striped" id="tabChek" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox"  id="checkMestre"/></th>
                            <th>Designação</th>
                            <th>Classe</th>
                            <th>Curso</th>
                            <th>Sala</th>
                            <th>Período</th>
                            <th>SubSistema</th>
                            <th>Status</th>
                            <th>Director da Turma</th>
                            <th>Vagas</th>
                            <th>Acção</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <tr>
                            <th><input type="checkbox"  id="checkMestre"/></th>
                            <th>Designação</th>
                            <th>Classe</th>
                            <th>Curso</th>
                            <th>Sala</th>
                            <th>Período</th>
                            <th>SubSistema</th>
                            <th>Status</th>
                            <th>Director da Turma</th>
                            <th>Vagas</th>
                            <th>Acção</th>
                        </tr>
                        </tr>
                    </tfoot>
                    <tbody>    

                        <?php if (count($_smarty_tpl->tpl_vars['TURMA']->value) <= $_smarty_tpl->tpl_vars['QTD_V']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TURMA']->value, 'P');
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
                                    <td>
                                        <span><?php echo $_smarty_tpl->tpl_vars['P']->key;?>
<input class="" type = "checkbox" name = "check_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="check_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
"/></span>
                                    </td>
                                    <td>

                                        <!--select class=""type = "text" name = "turma_let_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
">
                                            <option value="">...</option>
                                        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 8+1 - (1) : 1-(8)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>  
                                            <option value="A<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">A <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</option>
                                        <?php }
}
?>
                                    </select-->
                                        <input class="form-control" type = "text" style="max-width: 60px;" name = "nome_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Designacao'];?>
" />
                                    </td>
                                    <td>

                                        <select name="classe_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">
                                            <option value="">...</option>

                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLASSE']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Classe'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Classe'];?>
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
                                        <select name = "curso_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">

                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CURSO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Curso'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Curso'];?>
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
                                        <select name = "sala_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">
                                            <option value="">...</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SALA']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Sala'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Sala'];?>
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
                                        <select name = "periodo_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">
                                            <option value="">...</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PERIODO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Periodo'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Periodo'];?>
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
                                        <select name = "sub_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">
                                            <option value="">...</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUB']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Subsistema'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_SubSistema'];?>
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
" class="form-control">
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
                                        <select name = "prof_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" class="form-control">
                                            <option value="">...</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROFESSOR']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>

                                                <?php if ($_smarty_tpl->tpl_vars['P']->value['Codigo_Professor'] == $_smarty_tpl->tpl_vars['C']->value['Codigo']) {?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" selected="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo_Professor'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Nome'];?>
</option>                                                                      
                                                <?php }?>      
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Nome'];?>
</option>  
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                                        </select>
                                    </td>  
                                    <td class="text-center">
                                        <input type = "text" style="max-width: 30px;" name = "vaga_<?php echo $_smarty_tpl->tpl_vars['P']->key;?>
" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Vaga_Alunos'];?>
" class="form-control"/>
                                    </td>
                                    <td>
                                        <span> 
                                            <a type="button"  href="<?php echo $_smarty_tpl->tpl_vars['PAG_MATRICULA']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
" class="btn btn-outline-primary btn-sm "> <i class="fas fa-child align-items-center fa-1x" alt="matricula"></i></a>
                                            <button type="submit" value="<?php echo $_smarty_tpl->tpl_vars['P']->value['Codigo'];?>
" name="bt_apaga" class=" btn btn-outline-danger btn-sm ml-1"> <i class="fas fa-times fa-sm mb-0 fa-1x"></i></button>
                                        </span> </td> 
                                </tr> 
                            </a>

                        <?php
$_smarty_tpl->tpl_vars['P'] = $__foreach_P_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 



                    <?php }?>
                    <?php ob_start();
echo smarty_function_math(array('equation'=>"a-b+b",'b'=>count($_smarty_tpl->tpl_vars['TURMA']->value),'a'=>$_smarty_tpl->tpl_vars['QTD_V']->value),$_smarty_tpl);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_prefixVariable1+1 - (count($_smarty_tpl->tpl_vars['TURMA']->value)+1) : count($_smarty_tpl->tpl_vars['TURMA']->value)+1-($_prefixVariable1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = count($_smarty_tpl->tpl_vars['TURMA']->value)+1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
                        <input type = "hidden" name = "codigo_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" value = ""/>
                        <tr>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
<input type = "checkbox" name = "check_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" value=""/>
                            </td>
                            <td>
                                <!--select type = "text" name = "turma_let_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                <?php
$_smarty_tpl->tpl_vars['fo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['fo']->step = 1;$_smarty_tpl->tpl_vars['fo']->total = (int) ceil(($_smarty_tpl->tpl_vars['fo']->step > 0 ? 8+1 - (1) : 1-(8)+1)/abs($_smarty_tpl->tpl_vars['fo']->step));
if ($_smarty_tpl->tpl_vars['fo']->total > 0) {
for ($_smarty_tpl->tpl_vars['fo']->value = 1, $_smarty_tpl->tpl_vars['fo']->iteration = 1;$_smarty_tpl->tpl_vars['fo']->iteration <= $_smarty_tpl->tpl_vars['fo']->total;$_smarty_tpl->tpl_vars['fo']->value += $_smarty_tpl->tpl_vars['fo']->step, $_smarty_tpl->tpl_vars['fo']->iteration++) {
$_smarty_tpl->tpl_vars['fo']->first = $_smarty_tpl->tpl_vars['fo']->iteration === 1;$_smarty_tpl->tpl_vars['fo']->last = $_smarty_tpl->tpl_vars['fo']->iteration === $_smarty_tpl->tpl_vars['fo']->total;?>  
                                    <option value="A<?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
">A <?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
</option>
                                <?php }
}
?>
                            </select-->
                                <input class="form-control" style="max-width: 60px;" type = "text" name = "nome_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"/>
                            </td>
                            <td>

                                <select class="form-control" name="classe_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CLASSE']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                      
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "curso_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CURSO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                       
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "sala_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SALA']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                        
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "periodo_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PERIODO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                        
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  

                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "sub_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUB']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                        
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>     
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "estado_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ESTADO']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
"><?php echo $_smarty_tpl->tpl_vars['C']->value['Designacao'];?>
</option>                                                                        
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                                </select>
                            </td>  
                            <td>
                                <select class="form-control" name = "prof_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                    <option value="">...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROFESSOR']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['C']->value['Codigo'];?>
" ><?php echo $_smarty_tpl->tpl_vars['C']->value['Nome'];?>
</option>                                                                      
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                                </select>
                            </td> 
                            <td>
                                <input type = "text" style="max-width: 30px;" name = "vaga_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" value="" class="form-control"/>

                            </td>  
                            <td>
                            </td> 
                        </tr> 
                    <?php }
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<?php echo $_smarty_tpl->tpl_vars['MODAL']->value;?>

<?php }
}
