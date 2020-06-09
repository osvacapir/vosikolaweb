       <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Modulo</h4>
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
                      <th>Designação</th>
                      <th>Turma</th>   
                      <th>Disciplina</th>
                      <th>Ano Lectivo</th>
                      <th>Classe</th>
                      <th>Curso</th>
                      <th>Professor</th>                                     
                      <th>Acção</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Codigo</th>
                      <th>Designação</th>
                      <th>Turma</th>   
                      <th>Disciplina</th>
                      <th>Ano Lectivo</th>
                      <th>Classe</th>
                      <th>Curso</th>
                      <th>Professor</th>                                     
                      <th>Acção</th>
                    </tr>
                  </tfoot>
                  <tbody>                
                    {foreach from=$MODULO item=P}
                    <form name="modulo_Editar" method="post" action="">      
                    <tr>            
                      <td>{$P.Codigo}</td>
                      <td>{$P.Designacao}</td>  
                      <td>{$P.Turma_Designacao}</td>    
                      <td>{$P.Disciplina_Designacao}</td> 
                      <td>{$P.Ano_lectivo_Designacao}</td> 
                      <td>{$P.Classe_Designacao}</td> 
                      <td>{$P.Curso_Designacao}</td> 
                      <td>{$P.Professore_Nome}</td> 
                      <td>
                            <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                            <a href="{$PAG_MODULO}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                      </td> 
                    </tr> 
                    </form>
                    {/foreach}        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            