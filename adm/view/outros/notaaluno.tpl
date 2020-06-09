       <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Nota Aluno</h4>
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
                      <th>Disciplina</th> 
                      <th>Nota</th> 
                      <th>Ano Lectivo</th>  
                      <th>Tipo Avaliação</th>                                
                      <th>Trimestre</th>
                      <th>Data Cadastro</th>
                      <th>Utilizador</th>
                      <th>Acção</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Disciplina</th> 
                      <th>Nota</th> 
                      <th>Ano Lectivo</th>  
                      <th>Tipo Avaliação</th>                                
                      <th>Trimestre</th>
                      <th>Data Cadastro</th>
                      <th>Utilizador</th>
                      <th>Acção</th>
                    </tr>
                  </tfoot>
                  <tbody>                
                    {foreach from=$NOTAALUNO item=P}
                    <form name="notaaluno_Editar" method="post" action="">      
                    <tr>
                      <td>{$P.Codigo}</td>
                      <td>{$P.Aluno_Nome}</td>  
                      <td>{$P.Disciplina_Designacao}</td>  
                      <td>{$P.Nota}</td>  
                      <td>{$P.Ano_lectivo_Designacao}</td>
                      <td>{$P.Tipo_avaliacao_Descricao}</td>
                      <td>{$P.CodigoTrimestre}</td>
                      <td>{$P.DataCadastro}</td>
                      <td>{$P.Utilizador_Nome}</td>    
                      <td>
                            <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <a href="{$PAG_NOTAALUNO}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                      </td> 
                    </tr> 
                    </form>
                    {/foreach}        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            