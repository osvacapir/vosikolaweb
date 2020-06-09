<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Curriculo</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


<div class="card shadow mb-4">
    <form class="form-inline" action="" method="post"> 
        <div class="card-header py-2">    
            <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="Codigo_Subsistema">
                        {foreach from=$SUBSISTEMAS item=P}
                            {if $P.Codigo eq $CODIGO_SUBSISTEMA}
                                <option value="{$CODIGO_SUBSISTEMA}" selected>{$SUBSISTEMA_DESIGNACAO}</option>
                            {/if}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                    </select>        
                    <select class="form-control" name="Codigo_Curso">
                        <option value="" selected>...</option>
                        {foreach from=$CURSOS item=P}
                            {if $P.Codigo eq $CODIGO_CURSO}
                                <option value="{$CODIGO_CURSO}" selected>{$CURSO_DESIGNACAO}</option>
                            {/if}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                    </select>        
                    <select class="form-control" name="Codigo_Classe">
                        <option>...</option>
                        {foreach from=$CLASSES item=P}
                            {if $P.Codigo eq $CODIGO_CLASSE}
                                <option value="{$CODIGO_CLASSE}" selected>{$CLASSE_DESIGNACAO}</option>
                            {/if}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                    </select>        
                    <input class="form-control" value="{$DESIGNACAO}" required="" type="text" name="Designacao" placeholder="Designação"/>  
                    Nº/Disciplinas:<input style="min-width: 40px; max-width: 80px;"class="form-control" value="{$NUM_DISCIPLINA}" name="Num_Disciplina" required type="number" name="qtd" placeholder="123"/>  
                    <input type="hidden" name="Codigo" value="{$CODIGO}" class=""/>
                    <button class="btn btn-success" type="submit" name="bt_gravar_cab" value="btGravar"><i class="fas fa-plus"> Adicionar</i> </button>                 
                </div>
            </div>
            <hr>

            {$SMS_ERRO}
        </div>
    </form>
    <!-- DISCIPLINAS DO CURRICULO-->
    <div class="card-body">
        <div class="table-responsive">
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card-body">
        <div class="table-responsive">
            <form action="" method="post">
                <table class="table-bordered table-striped" id="tabChek" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Curso / Classe</th>                                            
                            <th>Lista de Disciplinas</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Curso / Classe</th>                                            
                            <th>Lista de Disciplinas</th>
                        </tr>
                    </tfoot>
                    <tbody>    
                        {foreach from=$CURRICULOS item=P}
                            <tr>
                                <td>
                                    <div class="col">

                                        <h1>   {$P.Classe_Designacao} Classe
                                            - 
                                            {$P.Curso_Designacao} </h1> 
                                    </div>

                                    <div class="col">
                                        <a class="btn btn-outline-primary" href="{$PAG_CURRICULO}/{$P.Codigo}"> <i class="fas fa-pencil-square-o">Alterar</i></a></div>
                                    <a href="{$PAG_CURRICULO}/{$P.Codigo}" class=" btn btn-outline-danger"> <i class="fas fa-times-rectangle">Apagar</i></a>
                                    <input name="curr" value="{$P.Codigo}"type="hidden"/>
                                    <input name="qtd" value="{$P.Num_Disciplina}"  type="hidden"/>
                                </td> 
                                <td>
                                    <table>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        {foreach from=$P.Lista item=C}
                                            <tr> 

                                                <td>{$C@key} 
                                                </td>
                                                <td>
                                                    <select class="form-control" name="Codigo_Disciplina_{$C@key}">
                                                        <option value="">...</option>
                                                        {foreach from=$DISCIPLINAS item=D}
                                                            {$P.Lista.Codigo}-
                                                            {if $D.Codigo eq $C.Codigo_Disciplina}
                                                                <option value="{$D.Codigo}" selected="{$D.Codigo}">{$D.Designacao}</option>
                                                            {/if}
                                                            <option value="{$D.Codigo}"</option>
                                                            {/foreach} 
                                                            </select>
                                                            </td>
                                                            </tr>

                                                        {/foreach}
                                                        Criadas
                                                        <strong>{$P.Lista|@count}</strong> de 
                                                        <strong>{$P.Num_Disciplina}</strong>

                                                        {for $foo=$P.Lista|@count+1 to  {math equation="a-b+b" b=$P.Lista|@count a=$P.Num_Disciplina}}
                                                            <tr>
                                                            <td>
                                                            {$foo}
                                                            </td>
                                                            <td>
                                                            <select class="form-control bg-yellow-400" name="Codigo_Disciplina_{$foo}">
                                                    <option value="">...</option>
                                                    {foreach from=$DISCIPLINAS item=D}
                                                        <option value="{$D.Codigo}">{$D.Designacao}</option>
                                                    {/foreach} 
                                                </select>
                                            </td>
                                        </tr>
                                    {/for}


                                    <tr>
                                        <td></td>
                                        <td rowspan="2" class="center-block">
                                            <button class="btn mw-100 btn-outline-primary" name="bt_gravar_det" type="submit"> <i class="fas fa-o">Guardar Disciplina</i></button>
                                        </td> 
                                    </tr>
                                </table>
                            </td>

                        </tr> 
                    {/foreach}        
                    </list>
            </table>
        </form>
    </div>
</div>
</div>

