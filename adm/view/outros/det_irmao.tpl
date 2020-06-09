<P>Irmão {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="irmao_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$ALUNO1}" required="required" type="text" name="Aluno1" placeholder="Aluno 1"/>  
            </div>   
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$ALUNO2}" required="required" type="text" name="Aluno2" placeholder="Aluno 2"/>  
            </div>                                                                                                                                                                                             
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

