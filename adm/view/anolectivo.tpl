<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Ano Lectivo</h4>

    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="card-header py-3">

    <div class="form-group" id="process" style="display:none;">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
            </div>
        </div>
    </div>
    <form name="cadcliente" class="form-inline"  method="post" action="">
        <div class="row">

            <input style="max-width: 80px" max="<script>document.write((new Date().getFullYear()+1));</script>" required class="form-control ml-1" minlength="4" maxlength="4" type="number" name="Designacao" value="{$DESIGNACAO}" placeholder="Ano Lectivo"/>
            <select class="form-control ml-1" name="Codigo_Estado">
                <option value="1">ACTIVO</option>
                <option value="2" selected>INACTIVO</option>              
            </select>  
            <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
            <button type="submit" class="btn btn-success " name="bt_gravar"> <i class="fas fa-plus"></i> Adicionar </button>
        </div>

    </form>
    <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
</div>
<!-- DataTales Example -->
{$SMS_ERRO}


<div class="card-body">
    <!--a class="btn btn-primary" href="{$PAG_EDIT}"> <i class="fas fa-plus"> Novo</i></a-->
    <h6>Lista de Anos Lectivos</h6>
    <div class="table-responsive">
        <table class="table-bordered table-striped" id="dataTable"  cellspacing="0">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Designação</th>
                    <th>Estado</th>
                    <th>Acção</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Codigo</th>
                    <th>Designação</th>
                    <th>Estado</th>
                    <th>Acção</th>
                </tr>
            </tfoot>
            <tbody>                  
                {foreach from=$ANO_L item=P}
                <form name="ano_Editar" method="post" action="">                        
                    <tr>
                        <td>{$P.Codigo}</td>
                        <td>{$P.Designacao}</td>
                        <td>{$P.Estado}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{$PAG_ANO_L}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <!--a href="{$PAG_ANO_L}/{$P.Codigo}" class=" btn btn-outline-danger" > <i class="fas fa-times"></i></a>-->
                        </td>                                     
                    </tr>            
                </form>
            {/foreach}        
            </tbody>
        </table>

        <center>
            {$PAGINAS}
        </center>
    </div>
</div>
<?php
