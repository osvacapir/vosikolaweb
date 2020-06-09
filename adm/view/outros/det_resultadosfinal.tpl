<P>Resultado Final {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Confirmacao">
                    <option value="" selected>Nome</option>
                        {foreach from=$MATRICULA item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Disciplina">
                    <option value="" selected>Disciplina</option>
                        {foreach from=$DISCIPLIN item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>            
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MEDIA_FINAL}" required="required" type="text" name="Media_Final" placeholder="Media_Final"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Classificacao_Final">
                    <option value="" selected>Classificação Final</option>
                        {foreach from=$CLASSIFICAC item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Utilizador">
                    <option value="" selected>Utilizador</option>
                        {foreach from=$USUARIO item=P}
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

