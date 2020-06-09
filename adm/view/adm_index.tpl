<!DOCTYPE html>

<html>
    <head>
        <title>{$TITULO_SITE}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--link href="{$GET_TEMA}/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{$GET_TEMA}/tema/contatos/contatos.css" rel="stylesheet" type="text/css"/>
        <script src="{$GET_TEMA}/tema/js/jquery-2.2.1.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/contatos/contatos.js" type="text/javascript"></script-->
        <!-- meu aquivo pessoal de CSS->
        <link href="{$GET_TEMA}/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- Custom fonts for this template-->
        <link href="{$GET_TEMA}/tema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{$GET_TEMA}/tema/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
        <link href="{$GET_TEMA}/tema/css/alert.css" rel="stylesheet" type="text/css">     
        <link href="{$GET_TEMA}/tema/css/nota/nota.css" rel="stylesheet" type="text/css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                jQuery(#form_meu).submit(function () {
                    var dados_f = jQuery(rhis).serialize();
                    $.ajax({
                        url: "anolectivo.php",
                        cache: false,
                        data: dados_f,
                        type: "POST",

                        success: function ($msg) {
                        }
                    })
                    event.preventDefault();
                });
            });
        </script>



    </head>
    <body id="page-top">

        <!-- começa  o container geral ->
        <div class="container-fluid">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion " id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{$PAG_INFO_SYS}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">{$TITULO_SITE}</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{$PAG_HOME}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Síntese</span></a>
                </li>
                <!-- Nav Item - Pages Collapse MenuMaster-->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPedT" aria-expanded="true" aria-controls="menuPedT">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Cadastro MASTER</span>
                    </a>
                    <div id="menuPedT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="{$PAG_ANO_L}">Ano Lectivo</a>
                            <a class="collapse-item" href="{$PAG_CURSO}">Cursos</a>
                            <a class="collapse-item" href="{$PAG_CLASSES}">Classes</a>
                            <a class="collapse-item" href="{$PAG_TURMA}">Turmas/Matrículas</a>
                            <a class="collapse-item" href="{$PAG_DISCIPLINA}">Disciplinas</a>

                            <a class="collapse-item" href="{$PAG_ANULA}">Anulações</a>
                            <a class="collapse-item" href="{$PAG_CATEG_FUNC}">Categoria Funcionario</a>
                            <a class="collapse-item" href="{$PAG_CLASSIF_FINAL}">Classificação Final</a>
                            <a class="collapse-item" href="{$PAG_COMUN}">Comuna</a>
                            <a class="collapse-item" href="{$PAG_CURRICULO}">Curriculo</a>
                            <a class="collapse-item" href="{$PAG_DECLARAC_NOT}">Declaração Notas</a>
                            <a class="collapse-item" href="{$PAG_EFEIT_DECLARAC}">Efeito Declaração</a>
                            <a class="collapse-item" href="{$PAG_ESCOLA}">Escola</a>
                            <a class="collapse-item" href="{$PAG_ESCOLA_SISTEM}">Escola Sistema</a>
                            <a class="collapse-item" href="{$PAG_ESTAD_CIVIL}">Estado Civil</a>
                            <a class="collapse-item" href="{$PAG_FALTAS}">Faltas</a>
                            <a class="collapse-item" href="{$PAG_INSCRIC}">Inscrição</a>
                            <a class="collapse-item" href="{$PAG_USUARIO}">Úsuario</a>
                        </div>
                    </div>
                </li>
                {if $smarty.session.USER.Nivel==1}
                    <!-- Heading -->
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Pages Collapse menuLista -->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuLista" aria-expanded="true" aria-controls="menuLista">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Listas</span>
                        </a>
                        <div id="menuLista" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 
                                    <a class="collapse-item" href="">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>
                {/if}        
                {if $smarty.session.USER.Nivel==1}
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        FALTAS E NOTAS
                    </div>
                    <!-- Nav Item - Pages Collapse menuFalta-->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuFalta" aria-expanded="true" aria-controls="menuFalta">
                            <i class="fas fa-fw fa-bookmark"></i>
                            <span>Faltas</span>
                        </a>
                        <div id="menuFalta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 
                                    <a class="collapse-item" href="">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>
                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse MenuAvaliação-->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuAvaliacao" aria-expanded="true" aria-controls="menuAvaliacao">
                            <i class="fas fa-fw fa-check-square"></i>
                            <span>Avaliação</span>
                        </a>
                        <div id="menuAvaliacao" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 

                                    <a class="collapse-item" href="{$PAG_AVALIACAO}/{$P.Codigo}">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>

                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse MenuAvaliação-->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuExame" aria-expanded="true" aria-controls="menuExame">
                            <i class="fas fa-fw fa-check-square"></i>
                            <span>Exames</span>
                        </a>
                        <div id="menuExame" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 
                                    <a class="collapse-item" href="">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>
                {/if}    
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Pages Collapse MenuPedagogico -->
                <div class="sidebar-heading">
                    DEFINIÇÕES PEDAGÓGICA
                </div>  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPedSimples" aria-expanded="true" aria-controls="menuPedSimples">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Simples</span>
                    </a>
                    <div id="menuPedSimples" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_TURMA}">Turmas/Matrículas</a>
                            <a class="collapse-item" href="">Currículo</a>
                            <a class="collapse-item" href="">Horários</a>
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições por Turma</a>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições Escola</a>
                        </div>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPedAvancado" aria-expanded="true" aria-controls="menuPedAvancado">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Avançadas</span>
                    </a>
                    <div id="menuPedAvancado" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <a class="collapse-item" href="{$PAG_ANO_L}">Bloqueios</a>
                            <a class="collapse-item" href="{$PAG_ANO_L}">Ano Lectivo</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Utilities Collapse Menu Secretaria-->

                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Pages Collapse MenuPedagogico -->
                <div class="sidebar-heading">
                    DEFINIÇÕES ADMINISTRATIVAS
                </div>  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuAdm" aria-expanded="true" aria-controls="menuAdm">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Funcionários</span>
                    </a>
                    <div id="menuPed" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_TURMA}">Cadastro de Funcionários</a>
                            <a class="collapse-item" href="{$PAG_TURMA}">Contas de Utilizador</a>
                            <a class="collapse-item" href="">Currículo</a>
                            <a class="collapse-item" href="">Horários</a>
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições por Turma</a>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições Escola</a>
                        </div>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPed" aria-expanded="true" aria-controls="menuPed">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Escola</span>
                    </a>
                    <div id="menuPed" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_ANO_L}">Dados da Escolas</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Utilities Collapse Menu Secretaria-->

                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Pages Collapse MenuPedagogico -->
                <div class="sidebar-heading">
                    SECRETARIA
                </div>  
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuSec" aria-expanded="true" aria-controls="menuSec">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Estudantes</span>
                    </a>
                    <div id="menuSec" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="{$PAG_TURMA}">Dados dos Alunos</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuSecretaria" aria-expanded="true" aria-controls="menuSecretaria">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Secretaria</span>
                    </a>
                    <div id="menuSecretaria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_TURMA}">Cadastro de Funcionários</a>
                            <a class="collapse-item" href="{$PAG_TURMA}">Contas de Utilizador</a>
                            <a class="collapse-item" href="">Currículo</a>
                            <a class="collapse-item" href="">Horários</a>
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições por Turma</a>
                            <a class="collapse-item" href="{$PAG_DEF_ESCOLA}">Definições Escola</a>
                        </div>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPed" aria-expanded="true" aria-controls="menuPed">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Escola</span>
                    </a>
                    <div id="menuPed" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-10 collapse-inner rounded">
                            <h6 class="collapse-header">Dados 1:</h6>
                            <a class="collapse-item" href="{$PAG_ANO_L}">Dados da Escolas</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Utilities Collapse Menu Secretaria-->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuSec" aria-expanded="true" aria-controls="menuSec">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Secretaria</span>
                    </a>
                    <div id="menuSec" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="{$PAG_TURMA}">Matricula</a>
                        </div>
                    </div>
                </li>
                {if $smarty.session.USER.Nivel==1}
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        IMPRESSÕES
                    </div>
                    <!-- Nav Item - Pages Collapse menuMiniPauta -->
                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse MenuAvaliação-->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuMiniPauta" aria-expanded="true" aria-controls="menuMiniPauta">
                            <i class="fas fa-fw fa-check-square"></i>
                            <span>Mini-Pautas</span>
                        </a>
                        <div id="menuMiniPauta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 

                                    <a class="collapse-item" href="{$PAG_AVALIACAO}/{$P.Codigo}">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>
                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse MenuAvaliação-->
                    <li class="nav-item p-1 m-0">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPauta" aria-expanded="true" aria-controls="menuPauta">
                            <i class="fas fa-fw fa-check-square"></i>
                            <span>Pautas</span>
                        </a>
                        <div id="menuPauta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white collapse-inner rounded">
                                {foreach from=$GET_TURMAS item=P} 
                                    <a class="collapse-item" href="">{$P.Designacao}</a>
                                {/foreach}  
                            </div>
                        </div>
                    </li>
                {/if}                
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    PROGRAMADOR
                </div>


                <!-- Nav Item - Utilities Collapse Menu Secretaria-->

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>
                <!-- Nav Item - Tables 
                <li class="nav-item">
                  <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->
            <!-- começa DIV conteudo-->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <!-- começa a div topo -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">

                        {if $LOGADO eq true}
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                            <h6 class="h6 mb-0 text-gray-800">{$smarty.session.SYS.CodEscola} - {$smarty.session.SYS.Escola}</h6>
                            <!-- Topbar Search ->
                             <form class="navbar-form d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                      <div class="input-group-append">
                                          <button class="btn btn-primary" type="button">
                                              <i class="fas fa-search fa-sm"></i>
                                          </button>
                                      </div>
                                  </div>
                            </form>
                            <!-- Topbar Navbar -->

                            <select class="ml-auto"><option>{$smarty.session.SYS.Ano}</option></select>
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">3+</span>
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                        <h6 class="dropdown-header">
                                            Alerts Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 12, 2019</div>
                                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 7, 2019</div>
                                                $290.29 has been deposited into your account!
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 2, 2019</div>
                                                Spending Alert: We've noticed unusually high spending for your account.
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </li>

                                <!-- Nav Item - Messages -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-envelope fa-fw"></i>
                                        <!-- Counter - Messages -->
                                        <span class="badge badge-danger badge-counter">7</span>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                        <h6 class="dropdown-header">
                                            Message Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                                <div class="small text-gray-500">Jae Chun · 1d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                                <div class="status-indicator bg-warning"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Ler Mais Mensagens</a>
                                    </div>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {$smarty.session.USER.Nome}

                                        </span>
                                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                    </a>

                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Definições
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Histórico
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Sair
                                        </a>
                                    </div> 
                                </li>

                            </ul>
                        {/if}
                    </nav>
                    <!-- End of Topbar --><!-- fim da div topo -->
                    <!-- INICIO DA PÁGINA PRINCIPAL -->
                    <div class="container-fluid">
                        <!-- coluna direita CONYEUDO CENTRAL ->
                        <div class="col-md-10">
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="glyphicon glyphicon-home"></i> Principal </a></li>
                                <li><a href="#"> Produtos </a></li>
                                <li><a href="#"> Info </a></li>
                            </ul>   
                        <!-- fim do menu breadcrumb-->             
                        {php}
                  Rotas::get_Pagina();
                  //var_dump(Rotas::$pag);
                        {/php}
                        <!--fim coluna direita-> 
                        </div--> 
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>
                                <p>Último Login: {$smarty.session.SYS.data_actual} ás {$smarty.session.SYS.hora_actual}
                                    <a href="#" data-toggle="modal" data-target="#logoutModal">
                                        Sair
                                    </a>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!--Conteúda da página inicial adm--> 
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {if $LOGADO == true}
                            Olá<strong> {$smarty.session.USER.Nome} </strong>Clique em "Confirmar" para terminar a Sessão.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" href="{$PAG_LOGOFF}">Confirmar</a>
                        </div>
                    {/if}
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->


        <script src="{$GET_TEMA}/tema/vendor/jquery/jquery.min.js"></script>
        <script src="{$GET_TEMA}/tema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="{$GET_TEMA}/tema/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="{$GET_TEMA}/tema/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="{$GET_TEMA}/tema/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{$GET_TEMA}/tema/js/demo/chart-area-demo.js"></script>
        <script src="{$GET_TEMA}/tema/js/demo/chart-pie-demo.js"></script>
        <script src="{$GET_TEMA}/tema/js/nota/nota.js"></script>





        <!-- Page level plugins -->
        <script src="{$GET_TEMA}/tema/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="{$GET_TEMA}/tema/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="{$GET_TEMA}/tema/js/demo/datatables-demo.js"></script>
        <script src="{$GET_TEMA}/tema/js/alert.js"></script>
        <!--PÁGINA DE LOGIN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    </body>
</html>
