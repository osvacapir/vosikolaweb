

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h6 class="h6 mb-0 font-weight-bold text-primary text-gray-800">Minipauta do Professor</h6>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatórios</a>
</div>


<!-- DataTales Example -->
<!div class="card shadow mb-4">
{$SMS_ERRO} 
<div class="row container-fluid card-header px-0 align-items-center">
    <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Turma:</label>
        <span class="text-white bold text-center">
            <h6>{$TURMA.1.Classe_Designacao} 
                {$TURMA.1.Designacao}</h6>
        </span>
    </div>
    <div class="col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Sala:</label>
        <div class="text-black bold text-center"><h6>{$TURMA.1.Sala_Designacao}</h6></div>
    </div>
    <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Período:</label>
        <div class="text-black bold text-center"><h6>{$TURMA.1.Periodo_Designacao}</h6></div>
    </div>
    <div class="col-md-2 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Curso:</label>
        <div class="text-black bold text-center"><h6>{$TURMA.1.Curso_Abreviatura}</h6></div>
    </div>
    <div class="col-md-4 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Director da Turma:</label>
        <div class="text-black bold text-center"><h6>{$TURMA.1.Professor_Nome}</h6></div>
    </div>
    <div class="col-md-1  text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Matriculados:</label>
        <div class="text-black bold text-center"><h6>{$QTD_T}</h6></div>
    </div>
    <div class=" col-md-1 text-white bg-gradient-secondary p-2 border-right border-secondary">
        <label class="small text-gray-400">Vagas:</label>
        <div class="text-black bold text-center"><h6>{$TURMA.1.Vaga_Alunos}</h6></div>
    </div>
</div>
<!div class="row">
<!--p class="mb-0">Tabela de<strong class="m-0 font-weight-bold text-primary"> Ano Lectivo</strong></p--> 
<form class="form" action="" method="POST" enctype="multipart/form-data"> 
    <div class="col text-white mt-1 mb-1">
        <button class="btn btn-success " type="submit" name="bt_gravar"> Gravar Alterações</button>
        <button class="btn btn-secondary " type="submit" name="bt_nota_adm"> Nota Administrativa</button>
    </div>
    <!div class="card-body">
    <div class="table-responsive">
        <table class=" table-striped small" id="tabChek" cellspacing="0">
            <thead  class="border-0 text-center italic">
                <tr>
            <colgroup class="border border-dark"> 
                <col class="border border-dark-800" span="3">
                <col class="border border-gray" span="3">
                <col class="border border-gray bg-warning" span="3">
                <col class="border border-gray" span="3">
                <col class="border border-gray bg-warning" span="5">
            </colgroup>
            <th class="" colspan="3"><label > Estudante</label></th>
            <th class="" colspan="3"><label > Iº Trimestre</label></th>
            <th class="" colspan="3"><label > IIº Trimestre</label></th>
            <th class="" colspan="3"><label > IIIº Trimestre</label></th>
            <th class="" colspan="5"><label > Classificação Final</label></th>  
            </tr>
            <tr class="">
                <th class=""> Nº</th>
                <th class="">S</th>
                <th class=""><span><input type="checkbox"  id="checkMestre"/>Nome</span></th>

                <th class=""><span><input type="checkbox" id="checkMestre"/>MAC 1</span></th>
                <th class=""><span><input type="checkbox"  id="checkMestre"/>CPP 1</span></th>
                <th class=>CT 1</span></th>

                <th class=""><span><input type="checkbox"  id="checkMestre"/>MAC 2</span></th>
                <th class=""><span><input type="checkbox"  id="checkMestre"/>CPP 2</th>
                <th class="">CT 2</th>

                <th class=""><span><input type="checkbox"  id="checkMestre"/>MAC 3</th>
                <th class=""><span><input type="checkbox"  id="checkMestre"/>CPP 3</th>
                <th class="">CT 3</th>

                <th class="">CAP</th>
                <th class=""><span><input type="checkbox"  id="checkMestre"/>PE</th>
                <th class="">Recurso</th>
                <th class="">Ép. Espe</th>
                <th class="">CF</th>
            </tr>
            </thead>

            <tbody>    
                {foreach from=$MATRICULADOS item=P}  
                    <tr class="">                               
                        <td tabindex="{$P@Key}" class="text text-center text-dark italic bold">
                            <input type = "hidden" name = "codigo_{$P@key}" value="{$P.Codigo}"/>
                            <span><input class="" type = "checkbox" name = "check_{$P@key}" value="check_{$P@key}"/>  {$P@key} </span>
                            <a href=""><i class="fas fa-3x fa-user"></i></a>
                        </td>
                        <td tabindex="{$P@Key}" class=" text-center italic">
                            <label selected="{$P.Sexo}">{$P.Sexo}</label>
                        </td>
                        <td tabindex="{$P@Key}" class=" text-left italic" border="2">
                            <label  style="min-width:200px;" >{$P.Nome}</label>
                        </td>


                        <!Iº TRIMESTRE>
                        <td  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" maxlength="2" size="2" type = "number" placeholder="MAC1" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CPP1" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CT1" name = "mac1_{$P@key}" value="" readonly />
                        </td>

                        
                        <!IIº TRIMESTRE>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="MAC2" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CPP2" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CT2" name = "mac1_{$P@key}" value=""  readonly/>
                        </td>

                        
                        <!IIIº TRIMESTRE>
                        <td  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="MAC3" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CPP3" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CT3" name = "mac1_{$P@key}" value=""  readonly/>
                        </td>

                        
                        <!CLASSIFICAÇÃO FINAL->
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CAP" name = "mac1_{$P@key}" value="" readonly/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="PE" name = "mac1_{$P@key}" value=""/>
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="REC" name = "mac1_{$P@key}" value="" />
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="ESP" name = "mac1_{$P@key}" value="" />
                        </td>
                        <td  tabindex="{$P@Key}"  class="italic"  style="max-height:25px; min-width:80px;">
                            <input class="valor text-center form-control bold text-dark" max="2"  type = "text" placeholder="CF" name = "mac1_{$P@key}" value=""  readonly/>
                        </td>



                    </tr> 
                {/foreach} 
            </tbody>
        </table>
    </div>
    <!--/div-->
    <div class="col text-white mt-1">
        <button class="btn btn-success ml-2" type="submit" name="bt_gravar">  Gravar Alterações</button>
    </div>
</form>
<!--/div-->
{if $MATRICULADOS|@count le $QTD_V} {/if}
<div class="mt-2 border-top">
    <form method="POST" enctype="multipart/form-data">
        <label>Seleccione o ficheiro <a href="#">F_100(baixar)</a></label>
        <input type="file" name="arquivo">
        <button class="btn-primary" type="submit" name="buscar">Carregar arquivo</button>
    </form>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <thead>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Sexo</th>
            </thead>
            {foreach from=$DADOS item=P}  
                <tr>
                    <td><input  name="Cod_{$P@key}" value="{$P.Codigo}"/></td>
                    <td><input name="Nome_{$P@key}" value="{$P.Nome}"/></td>
                    <td><input name="Sexo_{$P@key}" value="{$P.Sexo}"/></td>
                </tr>
            {/foreach}
            <input  type="hidden" name="qtd" value="{$DADOS|@count}"/>

        </table>  
        <button class="btn-secondary" type="submit" name="bt_adicionar">Adicionar à turma</button>
    </form>
</div>
<!--/div>
{$MODAL}
