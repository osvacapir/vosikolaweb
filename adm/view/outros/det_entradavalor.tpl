<P>Entrada Valor {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="comunas_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoAluno">
                    <option value="" selected>Aluno</option>
                        {foreach from=$MUNICIO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>         
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$SALDOANTERIOR}" required="required" type="text" name="SaldoAnterior" placeholder="Saldo Anterior"/>  
            </div>   
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TURMA}" required="required" type="text" name="Turma" placeholder="Turma"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CURSO}" required="required" type="text" name="Curso" placeholder="Curso"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$VALORENTREGUE}" required="required" type="text" name="ValorEntregue" placeholder="Valor Entregue"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MOEDA}" required="required" type="text" name="Moeda" placeholder="Moeda"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CONTRAVALOR}" required="required" type="text" name="ContraValor" placeholder="Contra Valor"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$SALDOACTUAL}" required="required" type="text" name="SaldoActual" placeholder="Saldo Actual"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CONTAMOVIMENTADA}" required="required" type="text" name="ContaMovimentada" placeholder="Conta Movimentada"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$NBORDORO}" required="required" type="text" name="NBordoro" placeholder="Nº Bordoro"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CAMBIO}" required="required" type="text" name="Cambio" placeholder="Cambio"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATADEPOSITO}" required="required" type="text" name="DataDeposito" placeholder="Data Deposito"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATACADASTRO}" required="required" type="text" name="DataCadastro" placeholder="Data Cadastro"/>  
            </div>                                                                                                                                                 
            <div class="col-md-2">
                <select class="form-control ml-1" name="CodigoUtilizador">
                    <option value="" selected>Utilizador</option>
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

