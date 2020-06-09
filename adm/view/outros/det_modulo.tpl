<P>Modulo {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="modulo_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESIGNACAO}" required="required" type="text" name="Designacao" placeholder="Designação"/>  
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
                <select class="form-control ml-1" name="Codigo_Disciplina">
                    <option value="" selected>Disciplina</option>
                        {foreach from=$DISCIPLINA item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>           
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_AnoLectivo">
                    <option value="" selected>Ano</option>
                        {foreach from=$ANOLECTIV item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>           
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Classe">
                    <option value="" selected>Classe</option>
                        {foreach from=$CLASSES item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>           
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Curso">
                    <option value="" selected>Curso</option>
                        {foreach from=$CURSO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>  
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Professor">
                    <option value="" selected>Professor</option>
                        {foreach from=$PROFESS item=P}
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

