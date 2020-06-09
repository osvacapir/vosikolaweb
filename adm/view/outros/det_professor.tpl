<P>Professor {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="professor_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$ABREVIATURA}" required="required" type="text" name="Abreviatura" placeholder="Abreviatura"/>  
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Pessoa">
                    <option value="" selected>Pessoa</option>
                        {foreach from=$PESSOA item=P}
                            <option value="{$P.Codigo}">{$P.Nome}</option>
                        {/foreach} 
                </select>        
            </div>  
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Categoria">
                    <option value="" selected>Categoria Funcionario</option>
                        {foreach from=$CATEGORIAFUN item=P}
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

