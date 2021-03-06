<script type="text/javascript">
    function mostraAlerta(elemento)
    {
        window.location.href = "{$PAG_ACESSO}/" + elemento.value;
    }
</script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h4 class="h3 mb-0 font-weight-bold text-primary text-gray-800">Acessos</h4>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">

            <!--ESCOLA-->
            <div class="col-md-4 mr-1">
                <div class="row">
                    <span>
                        <div class="col-md-auto">
                            <select class="form-control " name="Codigo_Tipo_Utilizador" onchange="javascript:mostraAlerta(this);" placeholder="Tipo de Usuário">
                                <option value="" selected>Selecionar</option>
                                <!--option value="0">Professor</option>
                                {foreach from=$TURMA item=P}
                                    <option value="{$P.Codigo}">{$P.Designacao}</option>
                                {/foreach} -->
                            </select>              
                        </div>  
                            <div class="col-md-auto">
                            <button class="btn btn-success" type="submit" name="btGravar" value="btSeleciona"> Enviar </button>                 
                        </div>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table-bordered table-striped col-md-12" width="100%" id="tabCheck" cellspacing="0">
                        <thead >
                            <tr>
                                <th class="col-md-1">Nº<input type="checkbox" name="selecionatudo" value="Todos" id="checkMestre" /></th>
                                <th class="col-md-auto">Nome</th>
                                <th class="col-md-auto">Estado</th>
                                <th class="col-md-auto">OP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="col-md-1">Nº</th>
                                <th class="col-md-auto">Nome</th>
                                <th class="col-md-auto">Estado</th>
                                <th class="col-md-auto">OP</th>                            </tr>
                        </tfoot>
                        <tbody>                  
                            {foreach from=$PESSOA item=P}
                                <tr>
                                    <td class="col-md-1">Nº<input type="checkbox" name="selecionarPessoa[]" value="{$P.Codigo}" /></td> 
                                    <td class="col-md-auto">{$P.Nome}</td>  
                                    <th class="col-md-auto">Estado</th>
                                    <th class="col-md-auto">OP</th>     
                                </tr>            
                            {/foreach}        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">

                <div class="table-responsive">
                    <table class="table-bordered table-striped" id="tabCheck1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="selecionatud>o" id="checkMestre"/></th>
                                <th>User</th>
                                <th>Senha</th>
                                <th>Acção</th>      
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Seleciona</th>
                                <th>User</th>
                                <th>Senha</th>
                                <th>Acção</th>      
                            </tr>
                        </tfoot>
                        <tbody>                  
                            {foreach from=$USUARIO item=P}
                            <form name="usuario_Editar" method="post" action=""> 
                                <tr>
                                    <td><input type="checkbox" name="selecionarUser[]" value="{$P.Codigo}" /></td>    
                                    <td>{$P.User}</td> 
                                    <td><input type="password" name="senha" value="{$P.Passe}" disabled="disabled" class="form-control ml-1" /></td>   
                                    <td>
                                        <a class="btn btn-outline-success" href="{$PAG_EDIT}/{$P.Codigo}"> <i class="fas fa-pencil-square-o"></i></a>
                                        <a href="{$PAG_ACESSO}/{$P.Codigo}" class=" btn btn-outline-danger" style="margin-left: 20px"> <i class="fas fa-times"></i></a>
                                    </td>  
                                </tr> 
                            </form>
                        {/foreach}        
                        </tbody>
                    </table>
                    {$SMS_ERRO}
                </div>
            </div>
            <!--ESCOLA-->
            <div class="col-md-4">

                <select class="form-control ml-1" name="Codigo_Tipo_Utilizador" onchange="javascript:mostraAlerta(this);" placeholder="Tipo de Usuário">
                    <option value="" selected>Selecionar</option>
                    <!--option value="0">Professor</option>
                    {foreach from=$TURMA item=P}
                        <option value="{$P.Codigo}">{$P.Designacao}</option>
                    {/foreach} -->
                </select>                  

                <div class="table-responsive">
                    <table class="table-bordered table-striped col-md-12" width="100%" id="tabCheck" cellspacing="0">
                        <thead >
                            <tr>
                                <th class="col-md-1"><input type="checkbox" name="selecionatudo" value="Todos" id="checkMestre" /></th>
                                <th class="col-md-auto">Nome</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th  class="col-md-1">Sel</th>
                                <th class="col-md-auto">Nome</th>
                            </tr>
                        </tfoot>
                        <tbody>                  
                            {foreach from=$PESSOA item=P}
                                <tr>
                                    <td class="col-md-1"><input type="checkbox" name="selecionarPessoa[]" value="{$P.Codigo}" /></td> 
                                    <td class="col-md-auto">{$P.Nome}</td>    
                                </tr>            
                            {/foreach}        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-1">
                <form name="{$PAG_ACESSO}" class="form-inline" action="" method="post">                   
                    <div class="col-md-2">
                        <button class="btn btn-success" type="submit" name="btGravar" value="btSeleciona"> Enviar </button>                 
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>