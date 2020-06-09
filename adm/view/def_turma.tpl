<P>Definições {$COD}</P>
    
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    {$SMS_ERRO}
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Curso</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="card-header py-3">
    <form class="form-inline" name="" action="" method="POST"> 
        <div class="row">
            <div class="col-md-2">
                Ano Lectivo: 
                <select class="form-control ml-1" name="Codigo_Ano_Lectivo" required>
                    <option value="{$smarty.session.SYS.CodAno}">{$smarty.session.SYS.Ano} </option>
                </select>
            </div>
            <div class="col-md-2">
                Escola: 
                <select class="form-control ml-1" name="Codigo_Escola" required>
                    <option value="{$smarty.session.SYS.CodEscola}">{$smarty.session.SYS.Escola} </option>
                </select>
            </div>
            <div class="col-md-1">
                Vagas: 
                <input type="number" name="Num_Turmas" class="form-control ml-1" value="{$NUM_TURMAS}" type="hidden"/>
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success" type="submit" name="btGravar"> Gravar </button>
            </div>
        </div>
    </form>
    <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
</div>
<!-- DataTales Example -->
{$SMS_ERRO}
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table-bordered table-striped"   cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Designação</th>
                        <th>Abreviatura</th>
                        <th>Estado</th>
                        <th>Alterar</th>     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo</th>
                        <th>Designação</th>
                        <th>Abreviatura</th>
                        <th>Estado</th>
                        <th>Acção</th>     
                    </tr>
                </tfoot>
                <tbody>                  
                    {foreach from=$CURSOS item=P}
                    <form name="curso_Editar" method="post" action=""> 
                        <tr>
                            <td>{$P.Codigo}</td>
                            <td class="descentralizado">{$P.Designacao}</td>    
                            <td class="descentralizado">{$P.Abreviatura}</td>    
                            <td>{$P.Estado_Designacao}</td>    
                            <td>
                                <input type="hidden" name="codigo" value="{$P.Codigo}">
                                <button name="bt_altera"  class=" btn btn-outline-success" > <i class="fas fa-pencil-square"></i></button>
                            </td>  
                        </tr> 
                    </form>
                {/foreach}        
                </tbody>
            </table>
        </div>
    </div>
</div>