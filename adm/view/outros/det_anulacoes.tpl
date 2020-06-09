<P>Anulações {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="classificacaofinal_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATA_ANULACAO}" required="required" type="date" name="Data_Anulacao" placeholder="Data Anulação"/>  
            </div>   
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Matricula">
                    <option value="" selected>Matriculas</option>
                        {foreach from=$NACION item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Motivo_Anulacao">
                    <option value="" selected>Motivo Anulação</option>
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

