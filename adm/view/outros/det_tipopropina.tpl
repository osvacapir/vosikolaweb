<P>Tipo Propina {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$VALOR}" required="required" type="text" name="Valor" placeholder="Valor"/>  
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
                    <input class="form-control ml-1" value="{$MOEDA}" required="required" type="text" name="Moeda" placeholder="Moeda"/>  
            </div>  
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Turma">
                    <option value="" selected>Turma</option>
                        {foreach from=$TURMA item=P}
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

