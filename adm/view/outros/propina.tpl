       <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Propina</h4>
            <a class="btn btn-outline-success" href="{$PAG_EDIT}"> <i class="fas fa-plus"></i></a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                      <th>Nome</th>
                      <th>Tipo Propina</th>
                      <th>Data Pagamento</th>
                      <th>Desconto</th>                                           
                      <th>Multa</th>
                      <th>Cambio</th>
                      <th>Total Pago USD</th>
                      <th>Total Pago AKZ</th>
                      <th>Data Vencimento</th>
                      <th>Obs</th>
                      <th>Nº Bordoro</th>
                      <th>Conta Movimentada</th>
                      <th>Hora Pagamento</th>
                      <th>Utilizador</th>
                      <th>Acção</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Tipo Propina</th>
                      <th>Data Pagamento</th>
                      <th>Desconto</th>                                           
                      <th>Multa</th>
                      <th>Cambio</th>
                      <th>Total Pago USD</th>
                      <th>Total Pago AKZ</th>
                      <th>Data Vencimento</th>
                      <th>Obs</th>
                      <th>Nº Bordoro</th>
                      <th>Conta Movimentada</th>
                      <th>Hora Pagamento</th>
                      <th>Utilizador</th>
                      <th>Acção</th>
                    </tr>
                  </tfoot>
                  <tbody>                
                    {foreach from=$PROPINA item=P}
                    <form name="comunas_Editar" method="post" action="">      
                    <tr>
                      <td>{$P.Codigo}</td>
                      <td>{$P.Pessoa_Nome}</td>  
                      <td>{$P.Tipos_propina_Designacao}</td>
                      <td>{$P.Data_Pagamento}</td>
                      <td>{$P.Desconto}</td>
                      <td>{$P.Multa}</td>
                      <td>{$P.Cambio}</td>
                      <td>{$P.Total_Pago_USD}</td>
                      <td>{$P.Total_Pago_AKZ}</td>
                      <td>{$P.DataVencimento}</td>
                      <td>{$P.obs}</td>
                      <td>{$P.N_Bordoro}</td>
                      <td>{$P.ContaMovimentada}</td>
                      <td>{$P.HoraPagamento}</td>
                      <td>{$P.Utilizador_Nome}</td>    
                      <td>
                            <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <a href="{$PAG_PROPINA}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                      </td> 
                    </tr> 
                    </form>
                    {/foreach}        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            