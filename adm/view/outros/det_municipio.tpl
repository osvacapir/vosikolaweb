<P>Municipio {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="municipio_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Provincia">
                    <option value="" selected>Provincia</option>
                        {foreach from=$PROVINCIA item=P}
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

