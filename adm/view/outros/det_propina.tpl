<P>Propina {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Aluno">
                    <option value="" selected>Aluno</option>
                        {foreach from=$ALUNO item=P}
                            <option value="{$P.Codigo}">{$P.Pessoa_Nome}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Tipo_Propina">
                    <option value="" selected>Tipo Propina</option>
                        {foreach from=$TIPOPROPINA item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATA_PAGAMENTO}" required="required" type="text" name="Data_Pagamento" placeholder="Data Pagamento"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESCONTO}" required="required" type="text" name="Desconto" placeholder="Desconto"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MULTA}" required="required" type="text" name="Multa" placeholder="Multa"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CAMBIO}" required="required" type="text" name="Cambio" placeholder="Cambio"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TOTAL_PAGO_USD}" required="required" type="text" name="Total_Pago_USD" placeholder="Total_Pago_USD"/>  
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
                    <input class="form-control ml-1" value="{$DATAVENCIMENTO}" required="required" type="text" name="DataVencimento" placeholder="DataVencimento"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$OBS}" required="required" type="text" name="obs" placeholder="obs"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$N_BORDORO}" required="required" type="text" name="N_Bordoro" placeholder="Nº Bordoro"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CONTAMOVIMENTADA}" required="required" type="text" name="ContaMovimentada" placeholder="Conta Movimentada"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TOTAL_PAGO_AKZ}" required="required" type="text" name="Total_Pago_AKZ" placeholder="Total Pago AKZ"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$HORAPAGAMENTO}" required="required" type="text" name="HoraPagamento" placeholder="Hora Pagamento"/>  
            </div>
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

