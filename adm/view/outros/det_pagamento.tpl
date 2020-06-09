<P>Comunas {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoAluno">
                    <option value="" selected>Aluno</option>
                        {foreach from=$ALUNO item=P}
                            <option value="{$P.Codigo}">{$P.Pessoa_Nome}</option>
                        {/foreach} 
                </select>        
            </div>
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Tipo_Servico">
                    <option value="" selected>Tipo Serviço</option>
                        {foreach from=$TIPOSERVIC item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>            
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATA}" required="required" type="date" name="Data" placeholder="Data"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$N_BORDORO}" required="required" type="text" name="N_Bordoro" placeholder="Nº Bordoro"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MULTA}" required="required" type="text" name="Multa" placeholder="Multa"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MES}" required="required" type="text" name="Mes" placeholder="Mes"/>  
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
                    <input class="form-control ml-1" value="{$OBSERVACAO}" required="required" type="text" name="Observacao" placeholder="Observação"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$ANO}" required="required" type="text" name="Ano" placeholder="Ano"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CONTAMOVIMENTADA}" required="required" type="text" name="ContaMovimentada" placeholder="Conta Movimentada"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$QUANTIDADE}" required="required" type="text" name="Quantidade" placeholder="Quantidade"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESCONTO}" required="required" type="text" name="Desconto" placeholder="Desconto"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TOTALGERAL}" required="required" type="text" name="Totalgeral" placeholder="Total geral"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATABANCO}" required="required" type="text" name="DataBanco" placeholder="Data Banco"/>  
            </div>                                                                                                                                                                                             
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

