<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema de Gestão Escolar para adquirir, ligue para 948 776 728 | 911 717 168 ou envie um emais para info@vosikola.com" />
        <meta name="keywords" content="Vosikola,Sistema de Gestão, Escolar,Escola,Benguela, Ensino, Educação, Listas,Horário" />
        <meta name="author" content="NOVAS TIC's, Soluções Inovadoras" />
        <title>{$TITULO_SITE}</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <!--link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->




        <link href="{$GET_TEMA}/tema/login/login.css" rel="stylesheet" type="text/css"->
        <link href="{$GET_TEMA}/tema/css/styles.css" rel="stylesheet" type="text/css">  

        <link href="{$GET_TEMA}/tema/css/alert.css" rel="stylesheet" type="text/css">  
        <!--link href="{$GET_TEMA}/tema/css/script.css" rel="stylesheet" type="text/css"-->  

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><h3>{$TITULO_SITE}</h3></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Galeria</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contactos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">

            <div class="container h-100">
                {$SMS_ERRO} 
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">SISTEMA DE GESTÃO ESCOLAR</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">O <strong>Virtual-OSIKOLA</strong>, é um Sistema versátil, ideal para a Gestão Escolar no domínio Pedagógico, Administrativo e Financeiro. 
                            Atende os Subsistemas do Ensino Geral, Formação de Professores, Técnico Profissional do Sistema de Educação Angolado. 
                            Está disponivel em versões Mobile(Smartphones, Tablets, Ipads), PC, MAC e Web.</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Login</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About section-->
        <section class="page-section bg-primary" id="about">
            <div class="row">
                <div class="login-container">

                    <div id="output">

                    </div>
                    <div class="avatar">
                        <img class="img-responsive break">
                    </div>
                    <div class="form-box">
                        <form class="form" name="login" method="post" action="">
                            <div class="form-group">
                                <label class="text-black bold">Código:</label> <input class="form-control" name="txt_email" type="text" placeholder="Usuário">
                                <label class="text-black bold">Senha:</label> <input  class="form-control" type="password" placeholder="password" name="txt_senha">
                            </div>
                            <button class="btn btn-dark btn-block btn-lg" name="txt_logar" id="txt_logar" value="txt_logar">Entrar</button>

                        </form>
                    </div>


                </div>

            </div>
        </section>
        <!-- Services section-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">Uma nova forma de Gerir Escolas</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-child text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Estudantes</h3>
                            <p class="text-muted mb-0">O Estudantes têm acesso ao Sistema para Visualizar listas, horários, notas, plano curricular do Curso e calendário</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-bookmark text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Professores</h3>
                            <p class="text-muted mb-0">Os professores têm acesso a visualizar todos os dados das turmas e disciplinas que leccionam. Podem lançar notas, ver relatórios e rankings.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-group text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Secretaria</h3>
                            <p class="text-muted mb-0">A secretaria tem uma forma rápida de processar matrículas, tipos de desistencias,consultar dados e notas dos alunos e muito mais</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-jpy text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Administradores</h3>
                            <p class="text-muted mb-0">Podem monitorar em tempo real a execução dos trabalhos de seus funcionários, estabelecer prazos e autorizações para tarefas específicas</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio section-->
        <section id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.1}">
                            <img class="img-fluid" src="{$IM.1}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ver mais...</div>
                                <div class="project-name">Galeria</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.2}"
                           ><img class="img-fluid" src="{$IM.2}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ver mais...</div>
                                <div class="project-name">Galeria</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.3}"
                           ><img class="img-fluid" src="{$IM.3}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ver mais...</div>
                                <div class="project-name">Galeria</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.4}"
                           ><img class="img-fluid" src="{$IM.4}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ver mais...</div>
                                <div class="project-name">Galeria</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.5}"
                           ><img class="img-fluid" src="{$IM.5}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ver mais...</div>
                                <div class="project-name">Galeria</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{$IG.6}"
                           ><img class="img-fluid" src="{$IM.6}" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                </div>
            </div>



        </section>
        <!-- Call to action section-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Baixar Aplicativo Android!</h2>
                <a class="btn btn-light btn-xl" href="#">Baixar Agora!</a>
            </div>
        </section>
        <!-- Contact section-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Fale com nosco!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Nossa Equipa está pronta para atender suas preocupações!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-adress fa-3x mb-3 text-muted"></i>
                        <div>Frontal ao Colégio Benguela</div>
                    </div>
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+244 (916) 290-059</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@yourwebsite.com">info@vosikola.com</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container py-3">
                <img src="{$LOGO}"/> 
                <div class="small text-center text-muted">
                    Copyright © <script>document.write(new Date().getFullYear());</script> - Novas TIC's
                </div>
                <img src="{$LOGO}"/> 
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->




        <script src="{$GET_TEMA}/tema/login/login.js" type="text/javascript"></script>  
        <script src="{$GET_TEMA}/tema/js/scripts.js"></script>
        <script src="{$GET_TEMA}/tema/js/style.js"></script>
        <script src="{$GET_TEMA}/tema/js/alert.js"></script>
    </body>
</html>
