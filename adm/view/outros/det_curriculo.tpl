<P>Curriculo {$COD}</P>

<hr>

<div class="card-header py-3">
    <div class="form-group" id="process" style="display:none;">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
            </div>
        </div>
    </div>
    {$SMS_ERRO}
    <form name="classificacaofinal_insere=" class="form-inline" action="" method="post"> 
        <div class="col-md-2">
            <input class="" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
        </div>   
        <div class="col-md-2">
            <select class=" " name="Codigo_Disciplina">
                <option value="">...</option>
                {foreach from=$DISCIPLINAS item=P}
                        <option value="{$P.Codigo}" selected="{$P.Codigo}">{$P.Designacao}</option>
                    <option value="{$P.Codigo}">{$P.Designacao}</option>
                {/foreach} 
            </select>        
        </div> 
        <div class="col-md-2">
            <select class=" " name="Curso_Designacao">
                <option value="" selected>Curso</option>
                {foreach from=$CURSOS item=P}
                    <option value="{$P.Codigo}">{$P.Designacao}</option>
                {/foreach} 
            </select>        
        </div> 
        <div class="col-md-2">
            <select class=" " name="Classe_Designacao">
                <option value="" selected>Classe</option>
                {foreach from=$CLASSES item=P}
                    <option value="{$P.Codigo}">{$P.Designacao}</option>
                {/foreach} 
            </select>        
        </div>    
        <div class="col-md-2">
            <select class=" " name="Subsistema_Designacao">
                <option value="" selected>Subsistema</option>
                {foreach from=$SUBSISTEMAS item=P}
                    <option value="{$P.Codigo}">{$P.Designacao}</option>
                {/foreach} 
            </select>        
        </div>                                                                                                                                                                                         
        <div class="col-md-2">
            <input type="hidden" name="Codigo" value="{$CODIGO}" class="" required/>
            <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
        </div>
    </form>
</div>

