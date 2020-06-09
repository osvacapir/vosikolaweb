<P>Definições {$smarty.session.SYS.Escola}</P>

<hr>

<div class="card-header py-3">
    {$SMS_ERRO}
    <div class="card-header py-3">
        <form class="form-inline" name="" action="" method="POST"> 
            <div class="row">
                <div class="col-md-2">
                    Ano Lectivo: 
                    <select class="form-control ml-1" name="Codigo_Ano_Lectivo" required>
                        <option value="{$smarty.session.SYS.CodAno}">{$smarty.session.SYS.Ano} </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Escola: 
                    <select class="form-control ml-1" name="Codigo_Escola" required>
                        <option value="{$smarty.session.SYS.CodEscola}">{$smarty.session.SYS.Escola} </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Vagas: 
                    <input type="number" name="Num_Turmas" class="form-control ml-1" value="{$NUM_TURMAS}"/>
                    <input type="hidden" name="Codigo" value="{$CODIGO}" class="form-control" required/>
                </div>
                <div class="col-md-3">
                    <br>
                    <button class="btn btn-success" type="submit" name="btGravar"> Gravar </button>
                </div>
            </div>
        </form>
        </p>
        <!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
    </div>
</div>
               