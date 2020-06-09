<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Salas</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="card-header py-3">
    <form name="cadcliente" class="form-inline"  method="post" action="" id="form_meu">
        <div class="row">

            <input required class="form-control ml-1 text-uppercase" type="text" name="Designacao" value="{$DESIGNACAO}" placeholder="Designação"/>  
            <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
            <button type="submit" class="btn btn-success ml-1" name="bt_gravar"> <i class="fas fa-plus"></i> Adicionar </button>
        </div>

    </form>
    <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
</div>



<!-- DataTales Example -->
{$SMS_ERRO}
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
                    {foreach from=$SALA item=P}
                    <form name="period_Editar" method="post" action="">    
                        <tr>
                            <td>{$P.Codigo}</td>
                            <td>{$P.Designacao}</td>    
                            <td>
                                <input type="hidden" name="codigo" value="{$P.Codigo}">
                                <button name="bt_altera"  class=" btn btn-outline-success" > <i class="fas fa-pencil-square"></i></button>                            </td> 
                        </tr>      
                    </form>
                {/foreach}        
                </tbody>
            </table>
        </div>
    </div>
</div>

