<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Subsistema</h4>
    <a class="btn btn-outline-success" href="{$PAG_EDIT}"> <i class="fas fa-plus"></i></a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50">h4>
        </i> Generate Report</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form name="subsistema_insere=" class="form-inline" action="" method="post"> 
        {$SMS_ERRO}

        <div class="row">
            <div class="form-group">
                <label>Designação</label>
                <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>                                                                                                                                                                                              
            <div class="form-group">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="bt_grava"> Gravar </button>                 
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
                        {foreach from=$SUBSISTEMA item=P}
                            <tr>
                                <td>{$P.Codigo}</td>
                                <td>{$P.Designacao}</td>    
                                <td>
                                    <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"n> <i class="fas fa-pencil-square-o"></i></a>
                                    <button name="bt_apaga" type="submit" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></button>
                                </td> 
                            </tr> 

                        {/foreach}        
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

