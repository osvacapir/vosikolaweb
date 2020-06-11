<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h6 class="h6 mb-0 font-weight-bold text-primary text-gray-800">Matrículas</h6>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatórios</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    {$SMS_ERRO} 
    <div class="row container-fluid card-header py- align-items-center">
        <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Turma:</label>
            <span class="text-white bold text-center">
                <h6>{$TURMA.1.Classe_Designacao} 
                    {$TURMA.1.Designacao}</h6>
            </span>        </div>
        <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Sala:</label>
            <div class="text-black bold text-center"><h6>{$TURMA.1.Sala_Designacao}</h6></div>
        </div>
        <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Período:</label>
            <div class="text-black bold text-center"><h6>{$TURMA.1.Periodo_Designacao}</h6></div>
        </div>
        <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Curso:</label>
            <div class="text-black bold text-center"><h6>{$TURMA.1.Curso_Abreviatura}</h6></div>
        </div>
        <div class="col-md-4 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Director da Turma:</label>
            <div class="text-black bold text-center"><h6>{$TURMA.1.Professor_Nome}</h6></div>
        </div>
        <div class="col-md-1  text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Matriculados:</label>
            <div class="text-black bold text-center"><h6>{$QTD_M}</h6></div>
        </div>
        <div class=" col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
            <label class="small text-gray-400">Vagas:</label>
            <div class="text-black bold text-center"><h6>{$TURMA.1.Vaga_Alunos}</h6></div>
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
                    {foreach from=$MATRICULADOS item=P}  
                    <a href="#">
                        <input type = "hidden" name = "codigo_{$P@key}" value="{$P.Codigo}"/>
                        <tr>
                            <td  class="text-center italic">
                              {$P.Codigo}  <span><input class="" type = "checkbox" name = "check[]" value="{$P.Codigo}"/>  {$P@key}</span>
                            </td>
                            <td class="text-center italic">
                                <label selected="{$P.Sexo}">{$P.Sexo}</label>
                            <!--select name="sexo_{$P@key}">
                                <!--option>...</option>
                                {if $P.Sexo eq null}
                                {/if}
                                <option selected="">M</option>
                                <option selected="">F</option>
                            </select-->
                            </td>
                            <td style="text-align: left;">
                                <label>{$P.Nome}</label>
                            </td>
                            <td class="text-center italic">
                                <label>{$P.DataNascimento}</label>
                            </td>
                            <td class="text-center italic">
                                <label>{$P.Idade}</label>
                            </td>
                            <td>

                                <select name="lingua_{$P@key}">
                                    <option value="">...</option>
                                    {foreach from=$LINGUA item=C}
                                        {if $P.Codigo_Lingua_Opcao eq $C.Codigo}
                                            <option value="{$C.Codigo}" selected="{$P.Codigo_Lingua_Opcao}">{$C.Designacao}</option> 
                                        {/if}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>                                                                      
                                    {/foreach}   
                                </select>
                            </td>    
                            <td>
                                <select name = "estado_{$P@key}">
                                    {foreach from=$ESTADO item=C}
                                        {if $P.Codigo_Estado eq $C.Codigo}
                                            <option value="{$C.Codigo}" selected="{$P.Codigo_Estado}">{$C.Designacao}</option>  
                                        {/if}
                                        <option value="{$C.Codigo}">{$C.Designacao}</option>    
                                    {/foreach}   
                                </select>
                            </td>    
                            <td>
                                <a type="button"  href="#" data-toggle="modal" data-target="#apagaModal" class="btn btn-outline-primary"> <i class="fas fa-child"></i></a>
                                <a type="button" href="{$PAG_MATRICULA}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 10px"> <i class="fas fa-times"></i></a>
                            </td> 
                        </tr> 
                    </a>

                {/foreach} 
                </tbody>
            </table>
            <!--/div-->
        </div>
    </form>
    {if $MATRICULADOS|@count le $QTD_V} {/if}
    <div class="mt-2 border-top">
        <form method="POST" enctype="multipart/form-data">
            <label>Seleccione o ficheiro <a href="#">F_100(baixar)</a></label>
            <input type="file" name="arquivo">
            <button class="btn-primary" type="submit" name="buscar">Carregar arquivo</button>
        </form>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Sexo</th>
                </thead>
                {foreach from=$DADOS item=P}  
                    <tr>
                        <td><input  name="Cod_{$P@key}" value="{$P.Codigo}"/></td>
                        <td><input name="Nome_{$P@key}" value="{$P.Nome}"/></td>
                        <td><input name="Sexo_{$P@key}" value="{$P.Sexo}"/></td>
                    </tr>
                {/foreach}
                <input  type="hidden" name="qtd" value="{$DADOS|@count}"/>

            </table>  
            <button class="btn-secondary" type="submit" name="bt_adicionar">Adicionar à turma</button>
        </form>
    </div>
</div>
{$MODAL}
