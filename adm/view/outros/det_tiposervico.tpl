<P>Tipo Serviço {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="tiposervico_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$PRECO}" required="required" type="text" name="Preco" placeholder="Preço"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESCRICAO}" required="required" type="text" name="Descricao" placeholder="Descrição"/>  
            </div>                            
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Utilizador">
                    <option value="" selected>Utilizador</option>
                        {foreach from=$USUARIO item=P}
                            <option value="{$P.Codigo}">{$P.Nome}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Moeda">
                    <option value="" selected>Moeda</option>
                        {foreach from=$MOEDA item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TIPOSERVICO}" required="required" type="text" name="TipoServico" placeholder="Tipo Serviço"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$STATUS}" required="required" type="text" name="Status" placeholder="Status"/>  
            </div>                                                                                                                                                                                           
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

