<?php

Class Config {

    const SITE_URL = "http://zeta_1",
            SITE_PASTA = "vosikola",
            //SITE_URL = "https://vosikola.com",
            //SITE_PASTA = "",
            EMP_NOME = "ZETABYTE",
            IDADE_ALUNO_BASE = '01-01-1970',
            BD_LIMIT_POR_PAG = 30,
            SITE_TEL = '990000000';
    //INFORMAÇÕES DO BANCO DE DADOS
    const
            BD_HOST = "zeta_1:3366",
            BD_USER = "u578573205_osiko",
            BD_BANCO = "u578573205_osiko",
            BD_HOST_SIMPLES = "zeta_1",
            BD_PORT= "3366",
            BD_OPPTION= [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ],
            //BD_HOST = "sql240.main-hosting.eu",
            //BD_USER = "u578573205_vosiko",
            //BD_BANCO = "u578573205_vosiko",
            BD_SENHA = "avatarbd",
            BD_PREFIX = "tb_";
    //INFORMÃÇÕES BÁSICAS DO SITE HOSPEDADO
    const SITE_NOME = "V-Osikola";
    const SITE_EMAIL_ADM = "lojavirtualfreitas@gmail.com";
    const SITE_CEP = '31535522';
    //INFORMAÇÕES DO BANCO DE DADOS HOSPEDADO
  /*  const BD_HOST = "mysql552.umbler.com",
            BD_USER = "hugovasconcelos",
            BD_SENHA = "hugo123456",
            BD_BANCO = "lojafreitas",
            BD_PREFIX = "qc_";*/
    //INFORMAÇÕES PARA PHP MAILLER
    const EMAIL_HOST = "smtp.gmail.com";
    const EMAIL_USER = "lojavirtualfreitas@gmail.com;";
    const EMAIL_NOME = "Contato Loja Freitas";
    const EMAIL_SENHA = "lojadofreitas";
    const EMAIL_PORTA = 587;
    const EMAIL_SMTPAUTH = true;
    const EMAIL_SMTPSECURE = "tls";
    const EMAIL_COPIA = "lojavirtualfreitas@gmail.com";
    //CONSTANTES PARA O PAGSEGURO
    const PS_EMAIL = "qcursos@hotmail.com"; // email pagseguro
    const PS_TOKEN = "0E86ADF6373348509E7B35389D92004C"; // token produção
    const PS_TOKEN_SBX = "1FB4D7860EA9491BA7AB4A9D9336C275";  // token do sandbox
    const PS_AMBIENTE = "production"; // production   /  sandbox

}
?>

