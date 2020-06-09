<P>Declaração Notas {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="declaracaonotas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATAPEDIDO}" required="required" type="date" name="dataPedido" placeholder="Data Pedido"/>  
            </div>   
            <div class="col-md-2">
                <select class="form-control ml-1" name="Efeitos_Designacao">
                    <option value="" selected>Efeito</option>
                        {foreach from=$NACION item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Alunos_Nome">
                    <option value="" selected>Nome</option>
                        {foreach from=$NACION item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Utilizadores_Nome">
                    <option value="" selected>Utilizador</option>
                        {foreach from=$NACION item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
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

