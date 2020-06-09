<P>Escola Sistema {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$VAGA_ALUNOS}" required="required" type="text" name="Vaga_Alunos" placeholder="Vaga Alunos"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Escola">
                    <option value="" selected>Escola</option>
                        {foreach from=$ESCOLA item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_SubSistema">
                    <option value="" selected>SubSistema</option>
                        {foreach from=$SUBSISTEM item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>             
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Coord_Subs">
                    <option value="" selected>Coord Subs</option>
                        {foreach from=$MUNICIO item=P}
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

