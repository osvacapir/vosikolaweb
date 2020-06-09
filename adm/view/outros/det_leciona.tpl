<P>Leciona {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="leciona_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoModulo">
                    <option value="" selected>Modulo</option>
                        {foreach from=$MODULO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>   
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoProfessor">
                    <option value="" selected>Professor</option>
                        {foreach from=$PROFESSOR item=P}
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

