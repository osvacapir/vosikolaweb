<P>Pessoa {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="pessoa_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$NOME}" required="required" type="text" name="Nome" placeholder="Nome"/>  
            </div>   
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$PAI}" required="required" type="text" name="Pai" placeholder="Pai"/>  
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$MAE}" required="required" type="text" name="Mae" placeholder="Mãe"/>  
            </div>
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Nacionalidade">
                    <option value="" selected>Nacionalidade</option>
                        {foreach from=$NACION item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Estado_Civil">
                    <option value="" selected>Estado Civil</option>
                        {foreach from=$ESTADOCIV item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>   
            </div> 
            <div class="col-md-2">
                <input class="form-control ml-1" value="{$DATANASCIMENTO}" required="required" type="date" name="DataNascimento" placeholder="Data Nascimento"/>  
            </div>    
            <div class="col-md-2">
                <input class="form-control ml-1" value="{$EMAIL}" required="required" type="email" name="Email" placeholder="Email"/>  
            </div>
            <div class="col-md-2">
                <input class="form-control ml-1" value="{$TELEFONE}" required="required" type="text" name="Telefone" placeholder="Telefone"/>  
            </div>
            <div class="col-md-2">
                <input class="form-control ml-1" value="{$CODIGO_STATUS}" required="required" type="text" name="Codigo_Status" placeholder="Status"/>  
            </div>   
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Endereco">
                    <option value="" selected>Endereço</option>
                        {foreach from=$ENDERECO item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div>    
            <div class="col-md-2">
                <select class="form-control ml-1" name="Codigo_Utilizador">
                    <option value="" selected>Utilizador</option>
                        {foreach from=$UTILIZADOR item=P}
                            <option value="{$P.Codigo}">{$P.Designacao}</option>
                        {/foreach} 
                </select>        
            </div> 
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$SEXO}" required="required" type="text" name="Sexo" placeholder="Sexo"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$N_DOC_ID}" required="required" type="text" name="N_Doc_ID" placeholder="N_Doc"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DATACADASTRO}" required="required" type="date" name="DataCadastro" placeholder="Data Cadastro"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$URL_FOTO}" required="required" type="text" name="URL_Foto" placeholder="URL Foto"/>  
            </div>
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$CURSO}" required="required" type="text" name="Curso" placeholder="Curso"/>  
            </div>                                                                                                                                                                                            
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

