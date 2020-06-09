<?php

class Login extends Conexao {

    private $user, $senha;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::USER);
    }

    function GetLoginADM($user, $senha) {

        $this->setUser($user);
        $this->setSenha($senha);

        $query = /* "SELECT {$this->prefix}utilizador.`Codigo` AS Codigo, 
                  tb_utilizador.`Nome` AS Nome,
                  tb_tipos_utilizador.`Codigo` AS Nivel,
                  tb_escola.`Nome` AS Escola FROM `{$this->prefix}utilizador` {$this->prefix}utilizador
                  INNER JOIN `tb_escola` tb_escola ON tb_escola.Codigo=tb_utilizador.Codigo_Escola
                  INNER JOIN `tb_tipos_utilizador` tb_tipos_utilizador ON tb_tipos_utilizador.`Codigo`=tb_utilizador.`Codigo_Tipo_Utilizador`
                  WHERE tb_tipos_utilizador.`Codigo`= 1 AND tb_utilizador.`User`=:User AND tb_utilizador.`Passe`=:Passe"; */

//an.Designacao AS AnoL, 
//es.Codigo_Ano_Lectivo AS CodAnoL,   INNER JOIN tb_escola_sistema es ON e.Codigo=es.Codigo_Escola   

                "SELECT   u.Codigo_Tipo_Utilizador AS Nivel,
                    e.Designacao AS Escola,
                u.Nome AS Nome,
                u.Codigo_Escola AS CodEscola, 
                u.Codigo AS Codigo FROM `{$this->tabela}` u
INNER JOIN tb_tipos_utilizador tp ON tp.Codigo=u.Codigo_Tipo_Utilizador 
INNER JOIN tb_escola e ON e.Codigo=u.Codigo_Escola WHERE u.User=:User AND u.Passe=:Passe";
        $params = array(':User' => $this->getUser(),
            ':Passe' => $this->getSenha());

        $this->ExecutaSQL($query, $params);
        //$this->GetLista();


        if ($this->TotalDados() > 0) {

            while ($lista = $this->ListarDados()) {

                $_SESSION['USER']['Codigo'] = $lista['Codigo'];
                $_SESSION['USER']['Nome'] = $lista['Nome'];
                $_SESSION['USER']['Nivel'] = $lista['Nivel'];
                $_SESSION['SYS']['Escola'] = $lista['Escola'];
                $_SESSION['SYS']['CodEscola'] = $lista['CodEscola'];
                $_SESSION['SYS']['Ano'] = 2020;
                $_SESSION['SYS']['CodAno'] = 3;
                $_SESSION['SYS']['data_actual'] = Sistema::DataAtualBR();
                $_SESSION['SYS']['hora_actual'] = Sistema::HoraAtual();
// caso o login seja efetivado com exito 
                return TRUE;
            }
// caso o login seja incorreto 
        } else {
            return FALSE;
        }
    }

    /* function GetLoginADM($user, $senha) {

      $this->setUser($user);
      $this->setSenha($senha);

      $query = "SELECT u.Codigo_Tipo_Utilizador AS Nivel,
      es.Codigo_Ano_Lectivo AS CodAnoL,
      an.Designacao AS AnoL,
      e.Designacao AS Escola,
      u.Nome AS Nome,
      u.Codigo_Escola AS CodEscola,
      u.Codigo AS Codigo
      FROM tb_utilizador u
      INNER JOIN tb_escola e ON e.Codigo=u.Codigo_Escola
      INNER JOIN tb_escola_sistema es ON e.Codigo=es.Codigo_Escola
      INNER JOIN tb_ano_lectivo an ON an.Codigo=es.Codigo_Ano_Lectivo
      INNER JOIN tb_tipos_utilizador tp ON tp.Codigo=u.Codigo_Tipo_Utilizador
      WHERE u.User=:User AND u.Passe=:Passe";
      $params = array(
      ':User' => $this->getUser(),
      ':Passe' => $this->getSenha()
      );

      $this->ExecutaSQL($query, $params);
      $this->GetLista();

      // caso o login seja efetivado com exito
      }
     */
    /*   function GetLogin($user, $senha) {
      $this->setUser($user);
      $this->setSenha($senha);

      $query = "SELECT SELECT e.Designacao AS Escola,u.Nome AS Nome,u.Codigo AS Codigo FROM `{$this->prefix}utilizador` u
      INNER JOIN `tb_escola` e ON e.Codigo=u.Codigo_Escola
      INNER JOIN `tb_tipos_utilizador` tp ON tp.`Codigo`=u.`Codigo_Tipo_Utilizador`
      WHERE u.`User`=:User AND u.`Passe`=:Passes";

      $params = array(
      ':User' => $this->getUser(),
      ':Passe' => $this->getSenha(),
      );

      $this->ExecutaSQL($query, $params);

      if ($this->TotalDados() > 0) {
      $lista = $this->ListarDados();

      $_SESSION['USER']['Codigo'] = $lista['Codigo'];
      $_SESSION['USER']['Nome'] = $lista['Nome'];
      $_SESSION['USER']['Escola'] = $lista['Escola'];
      $_SESSION['USER']['Escola'] = $lista['Escola'];
      /*
      $_SESSION['CLI']['cli_sobrenome'] =  $lista['cli_sobrenome'];
      $_SESSION['CLI']['cli_endereco']  =  $lista['cli_endereco'];
      $_SESSION['CLI']['cli_numero']    =  $lista['cli_numero'];
      $_SESSION['CLI']['cli_bairro']    =  $lista['cli_bairro'];
      $_SESSION['CLI']['cli_cidade']    =  $lista['cli_cidade'];
      $_SESSION['CLI']['cli_uf']        =  $lista['cli_uf'];
      $_SESSION['CLI']['cli_cpf']       =  $lista['cli_cpf'];
      $_SESSION['CLI']['cli_cep']       =  $lista['cli_cep'];
      $_SESSION['CLI']['cli_rg']        =  $lista['cli_rg'];
      $_SESSION['CLI']['cli_ddd']       =  $lista['cli_ddd'];
      $_SESSION['CLI']['cli_fone']      =  $lista['cli_fone'];
      $_SESSION['CLI']['cli_email']     =  $lista['cli_email'];
      $_SESSION['CLI']['cli_celular']   =  $lista['cli_celular'];
      $_SESSION['CLI']['cli_data_nasc'] =  $lista['cli_data_nasc'];
      $_SESSION['CLI']['cli_hora_cad']  =  $lista['cli_hora_cad'];
      $_SESSION['CLI']['cli_data_cad']  =  $lista['cli_data_cad'];
      $_SESSION['CLI']['cli_pass']      =  $lista['cli_pass'];

      Rotas::Redirecionar(0, Rotas::pag_CLienteLogin());
      } else {
      echo '<script> alert("Dados Incorretos"); </script>';
      }
      } */

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Nome' => $lista['Nome'],
                'Nivel' => $lista['Nivel'],
            );
            $i++;
        endwhile;
    }

    static function AcessoNegado() {
        echo '<div class="alert alert-danger"><a href="' . Rotas::pag_ClienteLogin() . '" class="btn btn-danger">Login </a> Acesso Negado, faça Login</div>';
    }

    static function Logado() {
        if (isset($_SESSION['USER']['Nome']) && isset($_SESSION['USER']['Codigo'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static function LogadoADM() {
        if (isset($_SESSION['USER']['Nome']) && isset($_SESSION['USER']['Codigo'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static function Logoff() {
        unset($_SESSION['USER']);
        echo '<h4 class="alert alert-success"> Saindo... </h4>';
        Rotas::Redirecionar(2, Rotas::pag_Login());
    }

    static function LogoffADM() {
        unset($_SESSION['USER']);
        unset($_SESSION['SYS']);

        Rotas::Redirecionar(0, '../index.php');
    }

//funcao para mostrar o menu do cliente
    static function MenuCliente() {

// verifo se não esta logado 
        if (!self::Logado()):

            self::AcessoNegado();
            Rotas::Redirecionar(2, Rotas::pag_ClienteLogin());

// caso nao redirecione  saiu  do bloco
            exit();

// caso esteja mostra a tela minha conta 
        else:

            $smarty = new Template();

            $smarty->assign('PAG_CONTA', Rotas::pag_ClienteConta());
            $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
            $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
            $smarty->assign('PAG_CLIENTE_PEDIDOS', Rotas::pag_CLientePedidos());
            $smarty->assign('PAG_CLIENTE_DADOS', Rotas::pag_CLienteDados());
            $smarty->assign('PAG_CLIENTE_SENHA', Rotas::pag_CLienteSenha());
            $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);

            $smarty->display('menu_cliente.tpl');

        endif;
    }

    private function setUser($user) {
        $this->user = $user;
    }

    private function setSenha($senha) {
        $this->senha = /* Sistema::Criptografia( */md5($senha)/* ) */;
    }

    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

}

?>