<P>Encarregado {$COD}</P>

<hr>  

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="encarregado_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$NOME}" required="required" type="text" name="Nome" placeholder="Nome"/>  
            </div>    
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$TELEFONE}" required="required" type="tel" name="Telefone" placeholder="Telefome"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$EMAIL}" required="required" type="email" name="Email" placeholder="Email"/>  
            </div>                        
            <div class="col-md-2">
                <select class="form-control ml-1" name="Profissao_Designacao">
                    <option value="" selected>Profissão</option>
                        {foreach from=$MUNICIO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>   
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$LOCAL_TRABALHO}" required="required" type="text" name="Local_Trabalho" placeholder="Local de Trabalho"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATACADASTRO}" required="required" type="text" name="DataCadastro" placeholder="Data Cadastro"/>  
            </div>
            <div class="col-md-2">
                <select class="form-control ml-1" name="Utilizador_Nome">
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

