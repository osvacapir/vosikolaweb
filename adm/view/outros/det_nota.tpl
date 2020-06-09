<P>Nota {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="nota_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoMatricula">
                    <option value="" selected>Matricula</option>
                        {foreach from=$MATRICUL item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>         
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$NOTA}" required="required" type="text" name="Nota" placeholder="Nota"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoDisciplina">
                    <option value="" selected>Disciplina</option>
                        {foreach from=$DISCIPLIN item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATACADASTRO}" required="required" type="date" name="DataCadastro" placeholder="Data Cadastro"/>  
            </div>
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoTrimestre">
                    <option value="" selected>Trimestre</option>
                        {foreach from=$MUNICIO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoTipoAvaliacao">
                    <option value="" selected>Tipo Avaliação</option>
                        {foreach from=$TIPOAVALIAC item=P}
                            <option value="{$P.Codigo}">{$P.Descricao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoUtilizador">
                    <option value="" selected>Utilizador</option>
                        {foreach from=$USUARIO item=P}
                            <option value="{$P.Codigo}">{$P.Nome}</option>
                        {/foreach} 
                </select>        
            </div>                                                                                                                                                                                            
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

