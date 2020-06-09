<?php

Class Encarregado extends Conexao {

    private $codigo;
    private $Nome;
    private $Telefone;
    private $Email;
    private $Codigo_Profissao;
    private $Local_Trabalho;
    private $Codigo_Utilizador;
    private $DataCadastro;

    function __construct() {

        parent::__construct();
        $this->setTabela('encarregado');
    }

    function Preparar($codigo, 
             $Nome, 
             $Telefone,
             $Email,
             $Codigo_Profissao, 
             $Local_Trabalho, 
             $Codigo_Utilizador, 
             $DataCadastro) {
        
             $this->SetCodigo($codigo);
             $this->setNome($Nome);
             $this->setTelefone($Telefone);
             $this->setEmail($Email);
             $this->setCodigo_Profissao($Codigo_Profissao);
             $this->set ($Codigo_Utilizador);
             $this->setDataCadastro($DataCadastro);
            }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->Nome;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function getEmail() {
        return $this->Email;
    }

    function getCodigo_Profissao() {
        return $this->Codigo_Profissao;
    }

    function getLocal_Trabalho() {
        return $this->Local_Trabalho;
    }

    function getCodigo_Utilizador() {
        return $this->Codigo_Utilizador;
    }

    function getDataCadastro() {
        return $this->DataCadastro;
    }
     public function GetEncarregado() {
        $query = "SELECT
            tb_encarregado.`Codigo` AS Codigo,
            tb_encarregado.`Nome` AS Nome,
            tb_encarregado.`Telefone` AS Telefone,
            tb_encarregado.`Email` AS Email,
            tb_encarregado.`Codigo_Profissao` AS Codigo_Profissao,
            tb_encarregado.`Local_Trabalho` AS Local_Trabalho,
            tb_encarregado.`Codigo_Utilizador` AS Codigo_Utilizador,
            tb_encarregado.`DataCadastro` AS DataCadastro,
            tb_profissao.`Designacao` AS Profissao_Designacao,
            tb_utilizador.`Nome` AS Utilizador_Nome
       FROM
            `tb_profissao` tb_profissao INNER JOIN `tb_encarregado` tb_encarregado ON tb_profissao.`Codigo` = tb_encarregado.`Codigo_Profissao`
            INNER JOIN `tb_utilizador` tb_utilizador ON tb_encarregado.`Codigo_Utilizador` = tb_utilizador.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetEncarregadoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Nome' => $lista['Nome'],
                'Telefone' => $lista['Telefone'],
                'Email' => $lista['Email'],
                'Codigo_Profissao' => $lista['Codigo_Profissao'],
                'Local_Trabalho' => $lista['Local_Trabalho'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador'],
                'DataCadastro' => $lista['DataCadastro'],
                'Profissao_Designacao' => $lista['Profissao_Designacao'],
                'Utilizador_Nome' => $lista['Utilizador_Nome']);
            $i++;
        endwhile;
    }
 function Grava($obj) {
        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
        } elseif (!isset($valores['Codigo'])) {
            unset($obj['Codigo']);
            return $this->Inserir($obj);
        }
    }

    function Apaga($id) {
        $this->GetEncarregadoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }
    
      function setNome($Nome) {
        $this->Nome = $Nome;
        if (strlen($Nome) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->Nome = $Nome;
        endif;
    }
    
    
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setCodigo_Profissao($Codigo_Profissao) {
        $this->Codigo_Profissao = $Codigo_Profissao;
    }

    function setLocal_Trabalho($Local_Trabalho) {
        $this->Local_Trabalho = $Local_Trabalho;
    }

    function setCodigo_Utilizador($Codigo_Utilizador) {
        $this->Codigo_Utilizador = $Codigo_Utilizador;
    }

    function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

        
    
       function get(Encarregado $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }
}

?>