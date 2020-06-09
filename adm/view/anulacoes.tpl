       <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Anulações</h4>
            <a class="btn btn-outline-success" href="{$PAG_EDIT}"> <i class="fas fa-plus"></i></a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
       
            <div class="card-header py-3">
                <form name="cadcliente" class="form-inline"  method="post" action="" id="form_meu">
                    <div class="row">

                        <input required class="form-control ml-1 text-uppercase" type="text" name="Codigo_Matricula" value="{$CODIGO_MATRICULA}" placeholder="Curso"/>
                        <input required class="form-control ml-1 text-uppercase" type="text" name="Data_Anulacao" value="{$DATA_ANULACAO}" placeholder="Abreviatura"/>
                        <input required class="form-control ml-1 text-uppercase" type="text" name="Codigo_Motivo_Anulacao" value="{$CODIGO_MOTIVO_ANULACAO}" placeholder="Motivo da anulação"/>
                        <input required class="form-control ml-1 text-uppercase" type="text" name="Codigo_utilizador" value="{$CODIGO_UTILIZADOR}" placeholder="Utilizador"/>
                            
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
                <table class="table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Data Anulação</th>
                      <th>Aluno</th>
                      <th>Motivo</th>                                            
                      <th>Acção</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Data Anulação</th>
                      <th>Aluno</th>
                      <th>Motivo</th>                                            
                      <th>Acção</th>
                    </tr>
                  </tfoot>
                  <tbody>                
                    {foreach from=$ANULACOES item=P}
                    <form name="anulacoes_Editar" method="post" action="">      
                    <tr>
                      <td>{$P.Codigo}</td>
                      <td>{$P.Data_Anulacao}</td>  
                      <td>{$P.Alunos_nome}</td>  
                      <td>{$P.Motivos_anulacao}</td>    
                      <td>
                            <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <a href="{$PAG_ANULA}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                      </td> 
                    </tr> 
                    </form>
                    {/foreach}        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            