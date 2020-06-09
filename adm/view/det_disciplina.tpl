<P>Disciplina {$CODIGO}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <div class="card-header py-3">
        <p class="mb-0">
        <form class="form-inline" name="disciplin_insere=" action="" method="post"> 
            <div class="row">
                <div class="col-md-2">
                    <input class="form-control ml-1" name="Designacao" value="{$DESIGNACAO}" type="text" placeholder="Designação" required="required"/>
                </div>

                <div class="col-md-2">
                    <input class="form-control ml-1" name="Abreviatura" value="{$ABREVIATURA}" type="text" placeholder="Abreviatura" required="required"/>
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
</DIV>

