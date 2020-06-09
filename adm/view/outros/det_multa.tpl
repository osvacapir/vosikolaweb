<P>Multa {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="multa_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DIA_INICIO}" required="required" type="text" name="Dia_Inicio" placeholder="Dia Inicio"/>  
            </div>  
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DIA_FIM}" required="required" type="text" name="Dia_Fim" placeholder="Dia Fim"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$PERCENTAGEM}" required="required" type="text" name="Percentagem" placeholder="Percentagem"/>  
            </div>  
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Tipo_Multa">
                    <option value="" selected>Tipo Multa</option>
                        {foreach from=$TIPOMULTA item=P}
                            <option value="{$P.Codigo}">{$P.Descrisao}</option>
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

