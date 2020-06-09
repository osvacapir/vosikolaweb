<P>Tipo Multa {$COD}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <form name="tipomulta_insere=" class="form-inline" action="" method="post"> 
        <div class="row">
            <div class="col-md-2">
                    <input class="form-control ml-1" value="{$DESCRISAO}" required="required" type="text" name="Descrisao" placeholder="Descrição"/>  
            </div>                                                                                                                                                                                                
            <div class="col-md-2">
                <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required>
                <button class="btn btn-success" type="submit" name="btGravar" value="btGravar"> Gravar </button>                 
            </div>
        </div>
    </form>
</div>

