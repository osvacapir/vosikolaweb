<P>Entrega Declaração {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Pedido_Declaracao">
                    <option value="" selected>Data Pedido Declaração</option>
                        {foreach from=$MUNICIO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>         
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATA_ENTREGA}" required="required" type="date" name="Data_Entrega" placeholder="Data Entrega"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CODIGO_UTILIZADOR}" required="required" type="text" name="Codigo_Utilizador" placeholder="Utilizador"/>  
            </div>                                                                                                                                                                                  
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

