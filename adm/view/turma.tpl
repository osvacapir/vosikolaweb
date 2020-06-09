<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h6 mb-0 font-weight-bold text-primary text-gray-800">Turma</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatórios</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form class="form" action="" method="POST"> 
        <div class="card-header py-2">
            {$SMS_ERRO} 

            <div class="col-md-auto">
                <span> 
                    <button class="btn btn-outline-primary ml-2" name="bt_grava" id="btGravar" type="submit"> Gravar Alterações</button>
                    <button class="btn btn-outline-danger ml-2" name="bt_apaga_maassa" type="submit"> Apagar </button>
                    <span class="text te"><b>{$QTD_T}</b></span> (<i>turmas registadas</i>)
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

                        {if $TURMA|@count le $QTD_V}
                            {foreach from=$TURMA item=P}  
                            <a href="#">
                                <input type = "hidden" name = "codigo_{$P@key}" value="{$P.Codigo}"/>
                                <tr>
                                    <td>
                                        <span>{$P@key}<input class="" type = "checkbox" name = "check_{$P@key}" value="check_{$P@key}"/></span>
                                    </td>
                                    <td>

                                        <!--select class=""type = "text" name = "turma_let_{$P@key}">
                                            <option value="">...</option>
                                        {for $foo=1 to 8}  
                                            <option value="A{$foo}">A {$foo}</option>
                                        {/for}
                                    </select-->
                                        <input class="form-control" type = "text" style="max-width: 60px;" name = "nome_{$P@key}" value="{$P.Designacao}" />
                                    </td>
                                    <td>

                                        <select name="classe_{$P@key}" class="form-control">
                                            <option value="">...</option>

                                            {foreach from=$CLASSE item=C}
                                                {if $P.Codigo_Classe eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Classe}">{$C.Designacao}</option> 
                                                {/if}
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                      
                                            {/foreach}   
                                        </select>
                                    </td>    
                                    <td>
                                        <select name = "curso_{$P@key}" class="form-control">

                                            {foreach from=$CURSO item=C}
                                                {if $P.Codigo_Curso eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Curso}">{$C.Designacao}</option>  
                                                {/if}
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>    
                                            {/foreach}   
                                        </select>
                                    </td>    
                                    <td>
                                        <select name = "sala_{$P@key}" class="form-control">
                                            <option value="">...</option>
                                            {foreach from=$SALA item=C}
                                                {if $P.Codigo_Sala eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Sala}">{$C.Designacao}</option>                                                                      
                                                {/if}
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>   
                                            {/foreach}  
                                        </select>
                                    </td>    
                                    <td>
                                        <select name = "periodo_{$P@key}" class="form-control">
                                            <option value="">...</option>
                                            {foreach from=$PERIODO item=C}
                                                {if $P.Codigo_Periodo eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Periodo}">{$C.Designacao}</option>                                                                      
                                                {/if}
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>  
                                            {/foreach}  

                                        </select>
                                    </td>    
                                    <td>
                                        <select name = "sub_{$P@key}" class="form-control">
                                            <option value="">...</option>
                                            {foreach from=$SUB item=C}
                                                {if $P.Codigo_Subsistema eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_SubSistema}">{$C.Designacao}</option>                                                                      
                                                {/if}                
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>  
                                            {/foreach}     
                                        </select>
                                    </td>    
                                    <td>
                                        <select name = "estado_{$P@key}" class="form-control">
                                            {foreach from=$ESTADO item=C}
                                                {if $P.Codigo_Estado eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Estado}">{$C.Designacao}</option> 
                                                {/if}      
                                                <option value="{$C.Codigo}">{$C.Designacao}</option>  
                                            {/foreach}  
                                        </select>
                                    </td>   
                                    <td>
                                        <select name = "prof_{$P@key}" class="form-control">
                                            <option value="">...</option>
                                            {foreach from=$PROFESSOR item=C}

                                                {if $P.Codigo_Professor eq $C.Codigo}
                                                    <option value="{$C.Codigo}" selected="{$P.Codigo_Professor}">{$C.Nome}</option>                                                                      
                                                {/if}      
                                                <option value="{$C.Codigo}">{$C.Nome}</option>  
                                            {/foreach}  
                                        </select>
                                    </td>  
                                    <td class="text-center">
                                        <input type = "text" style="max-width: 30px;" name = "vaga_{$P@key}" value="{$P.Vaga_Alunos}" class="form-control"/>
                                    </td>
                                    <td>
                                        <span> 
                                            <a type="button"  href="{$PAG_MATRICULA}/{$P.Codigo}" class="btn btn-outline-primary btn-sm "> <i class="fas fa-child align-items-center fa-1x" alt="matricula"></i></a>
                                            <button type="submit" value="{$P.Codigo}" name="bt_apaga" class=" btn btn-outline-danger btn-sm ml-1"> <i class="fas fa-times fa-sm mb-0 fa-1x"></i></button>
                                        </span> </td> 
                                </tr> 
                            </a>

                        {/foreach} 



                    {/if}
                    {for $foo=$TURMA|@count+1 to {math equation="a-b+b" b=$TURMA|@count a=$QTD_V}}
                        <input type = "hidden" name = "codigo_{$foo}" value = ""/>
                        <tr>
                            <td>
                                {$foo}<input type = "checkbox" name = "check_{$foo}" value=""/>
                            </td>
                            <td>
                                <!--select type = "text" name = "turma_let_{$foo}">
                                {for $fo=1 to 8}  
                                    <option value="A{$fo}">A {$fo}</option>
                                {/for}
                            </select-->
                                <input class="form-control" style="max-width: 60px;" type = "text" name = "nome_{$foo}"/>
                            </td>
                            <td>

                                <select class="form-control" name="classe_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$CLASSE item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                      
                                    {/foreach}   
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "curso_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$CURSO item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                       
                                    {/foreach}   
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "sala_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$SALA item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                        
                                    {/foreach}  
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "periodo_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$PERIODO item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                        
                                    {/foreach}  

                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "sub_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$SUB item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                        
                                    {/foreach}     
                                </select>
                            </td>    
                            <td>
                                <select class="form-control" name = "estado_{$foo}">
                                    {foreach from=$ESTADO item=C}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                        
                                    {/foreach}  
                                </select>
                            </td>  
                            <td>
                                <select class="form-control" name = "prof_{$foo}">
                                    <option value="">...</option>
                                    {foreach from=$PROFESSOR item=C}
                                        <option value="{$C.Codigo}" >{$C.Nome}</option>                                                                      
                                    {/foreach}  
                                </select>
                            </td> 
                            <td>
                                <input type = "text" style="max-width: 30px;" name = "vaga_{$foo}" value="" class="form-control"/>

                            </td>  
                            <td>
                            </td> 
                        </tr> 
                    {/for}

                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
{$MODAL}
