  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Pessoa</h4>
            <a class="btn btn-outline-success" href="{$PAG_EDIT_PESS}"> <i class="fas fa-plus"></i></a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <p class="mb-0">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Pai</th>
                      <th>Mãe</th>
                      <th>Nacionalidade</th>
                      <th>Estado Civil</th>
                      <th>Data Nascimento</th>
                      <th>Email</th>
                      <th>Telefone</th>
                      <th>Status</th>
                      <th>Endereço</th>
                      <th>Utilizador</th>
                      <th>Sexo</th>
                      <th>N Documento</th>
                      <th>Data Cadastro</th>
                      <th>URL Foto</th>
                      <th>Curso</th>
                      <th>Acção</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Pai</th>
                      <th>Mãe</th>
                      <th>Nacionalidade</th>
                      <th>Estado Civil</th>
                      <th>Data Nascimento</th>
                      <th>Email</th>
                      <th>Telefone</th>
                      <th>Status</th>
                      <th>Endereço</th>
                      <th>Utilizador</th>
                      <th>Sexo</th>
                      <th>N Documento</th>
                      <th>Data Cadastro</th>
                      <th>URL Foto</th>
                      <th>Curso</th>
                      <th>Acção</th>
                    </tr>
                  </tfoot>
                  <tbody>                  
                    {foreach from=$PESSOA item=P}
                    <tr>
                      <td>{$P.Codigo}</td>
                      <td>{$P.Nome}</td>    
                      <td>{$P.Pai}</td>    
                      <td>{$P.Mae}</td>    
                      <td>{$P.Codigo_Nacionalidade}</td>    
                      <td>{$P.Codigo_Estado_Civil}</td>    
                      <td>{$P.DataNascimento}</td>    
                      <td>{$P.Email}</td>    
                      <td>{$P.Telefone}</td>    
                      <td>{$P.Codigo_Status}</td>    
                      <td>{$P.Codigo_Endereco}</td>    
                      <td>{$P.Codigo_Utilizador}</td>    
                      <td>{$P.Sexo}</td>    
                      <td>{$P.N_Doc_ID}</td>    
                      <td>{$P.DataCadastro}</td>    
                      <td>{$P.URL_Foto}</td>    
                      <td>{$P.Curso}</td>    
                      <td>
                            <a class="btn btn-outline-success" href="{$PAG_EDIT_PESS}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <a href="{$PAG_PESSOA}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                      </td>  
                    </tr>            
                    {/foreach}        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

      