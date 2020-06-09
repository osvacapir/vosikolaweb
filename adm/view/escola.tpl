<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Escola</h4>
    <a class="btn btn-outline-success" href="{$PAG_EDIT}"> <i class="fas fa-plus"></i></a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50">h4>
        </i> Generate Report</a>
</div>

<form name="subsistema_insere=" class="form-inline" action="" method="post"> 
        {$SMS_ERRO}

        <div class="row">
            <div class="form-group">
                <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>
            <div class="form-group">
                <input class="form-control ml-1" value="{$TELEFONE_FIXO}" type="text" name="Telefone_Fixo" placeholder="Telefone fixo"/>  
            </div>
           <div class="form-group">
                <input class="form-control ml-1" value="{$TELEFONE_MOVEL}" type="text" name="Telefone_movel" placeholder="Telefone movel"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$EMAIL}" type="text" name="Email" placeholder="Email"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$SITE}" type="text" name="Site" placeholder="Site"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$LOCALIDADE}" required="required" type="text" name="Localidade" placeholder="Localidade"/>  
            </div>
              <div class="form-group">
                <input class="form-control ml-1" value="{$NIF}" type="text" name="Nif" placeholder="NIF"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA1}" type="text" name="Conta_Bancaria1" placeholder="Conta Bancaria1"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA2}" type="text" name="Conta_Bancaria2" placeholder="Conta Bancaria2"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA3}" type="text" name="conta_bancaria3" placeholder="Conta Bancaria3"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA4}" type="text" name="Conta_Bancaria4" placeholder="Conta Bancaria4"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA5}" type="text" name="Conta_Bancaria5" placeholder="Conta Bancaria5"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$CONTA_BANCARIA6}" type="text" name="Conta_Bancaria6" placeholder="Conta Bancaria6"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$VAGAS_TURMA}" type="text" name="Vagas_Turma" placeholder="Vagas das Turma"/>  
            </div>
             <div class="form-group">
                <input class="form-control ml-1" value="{$VAGAS_ALUNO}" type="text" name="Vagas_Alunos" placeholder="Vagas das Turma"/>  
            </div>
            <div class="form-group">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="bt_grava"> Gravar </button>                 
            </div>
        </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Designação</th>
                             <th>Telefone fixo</th>                                        
                            <th>Telefone móvel</th>                                        
                            <th>Email</th>                                        
                            <th>Site</th>                                        
                            <th>Localidade</th>                                        
                            <th>Nif</th>                                        
                            <th>Conta bancaria nº1</th>                                        
                            <th>Conta bancaria nº2</th>                                        
                            <th>Conta bancaria nº3</th>                                        
                            <th>Conta bancaria nº4</th>                                        
                            <th>Conta bancaria nº5</th>                                        
                            <th>Conta bancaria nº6</th>                                        
                            <th>Turmas vagas</th>                                        
                            <th>Vagas para alunos</th>
                            <th>Acção</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Designação</th>                                        
                            <th>Telefone fixo</th>                                        
                            <th>Telefone móvel</th>                                        
                            <th>Email</th>                                        
                            <th>Site</th>                                        
                            <th>Localidade</th>                                        
                            <th>Nif</th>                                        
                            <th>Conta bancaria nº1</th>                                        
                            <th>Conta bancaria nº2</th>                                        
                            <th>Conta bancaria nº3</th>                                        
                            <th>Conta bancaria nº4</th>                                        
                            <th>Conta bancaria nº5</th>                                        
                            <th>Conta bancaria nº6</th>                                        
                            <th>Turmas vagas</th>                                        
                            <th>Vagas para alunos</th>                                        
                            <th>Acção</th>
                        </tr>
                    </tfoot>
                    <tbody>                
                        {foreach from=$ESCOLA item=P}
                            <tr>
                                <td>{$P.Codigo}</td>
                                <td class="descentralizado">{$P.Designacao}</td>    
                                <td class="descentralizado">{$P.Telefone_Fixo}</td>    
                                <td class="descentralizado">{$P.Telefone_Movel}</td>    
                                <td class="descentralizado">{$P.Email}</td>    
                                <td class="descentralizado">{$P.Site}</td>    
                                <td class="descentralizado">{$P.Localidade}</td>    
                                <td class="descentralizado">{$P.NIF}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria1}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria2}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria3}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria4}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria5}</td>    
                                <td class="descentralizado">{$P.Conta_Bancaria6}</td>    
                                <td class="descentralizado">{$P.Vagas_Turma}</td>    
                                <td class="descentralizado">{$P.Vagas_Alunos}</td>    
                                <td>
                                    <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                                    <button name="bt_apaga" type="submit" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></button>
                                </td> 
                            </tr> 

                        {/foreach}        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

