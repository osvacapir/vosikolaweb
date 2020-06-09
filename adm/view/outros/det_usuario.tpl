<P>Usuário {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form class="form-inline" name="usuario_insere" action="" method="post"> 
                <div class="row">                                  
                    <div class="col-md-2">
                        <input class="form-control ml-1 text-uppercase" name="Nome" value="{$NOME}" type="text" placeholder="Nome" required/>
                    </div>
                    
                    <div class="col-md-2">
                        <input class="form-control ml-1" name="User" value="{$USER}" type="text" placeholder="User" required/>
                    </div>
                    
                    <div class="col-md-2">
                        <input class="form-control ml-1" name="Passe" value="{$PASSE}" type="text" placeholder="Senha" required/>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control ml-1" name="Codigo_Tipo_Utilizador" placeholder="Tipo de Usuário">
                            <option value="1">Programador</option>
                            <option value="2">Professor</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <input class="form-control ml-1" name="DataCadastro" value="{$DATACADASTRO}" type="text" placeholder="Data Cadastro" required/>
                    </div>

                    <div class="col-md-2">
                        <input class="form-control ml-1" name="LoginStatus" value="{$LOGINSTATUS}" type="text" placeholder="Login Status" required/>
                    </div>                    
                    
                    <div class="col-md-2">
                        <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                        <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button> 
                    </div>
                </div>
            </form>
              </p>
              <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
            </div>




