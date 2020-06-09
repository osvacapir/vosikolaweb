

<?php

Class Merito extends Conexao {

    private $Codigo;
    private $Designacao;
    private $DataMerito;
    private $CodigoMatricula;
    private $CodigoUtilizador;

    function __construct() {
        parent::__construct();
        $this->setTabela('merito');
    }
    
    function Preparar($Codigo, $Designacao, $DataMerito,$CodigoMatricula,$CodigoUtilizador) {
        $this->SetCodigo($Codigo);
        $this->SetDesignacao($Designacao);
        $this->setDataMerito($DataMerito);
        $this->setCodigoMatricula($CodigoMatricula);
         $this->setCodigoUtilizador($CodigoUtilizador);
    }

    function GetMerito() {
        $query = "SELECT
                tb_merito.`Codigo` AS Codigo,
                tb_merito.`Descricao` AS Descricao,
                tb_merito.`Data_Merito` AS Data_Merito,
                tb_merito.`Codigo_Matricula` AS Codigo_Matricula,
                tb_merito.`Codigo_Utilizador` AS Codigo_Utilizador,
                tb_utilizador.`Nome` AS Utilizador_Nome,
                tb_pessoa.`Nome` AS Pessoa_Nome
           FROM
                `tb_utilizador` tb_utilizador INNER JOIN `tb_merito` tb_merito ON tb_utilizador.`Codigo` = tb_merito.`Codigo_Utilizador`
                INNER JOIN `tb_matricula` tb_matricula ON tb_utilizador.`Codigo` = tb_matricula.`Codigo_Utilizador`
                AND tb_matricula.`Codigo` = tb_merito.`Codigo_Matricula`
                INNER JOIN `tb_alunos` tb_alunos ON tb_matricula.`Codigo_Aluno` = tb_alunos.`Codigo`
                AND tb_utilizador.`Codigo` = tb_alunos.`Codigo_Utilizador`
                INNER JOIN `tb_pessoa` tb_pessoa ON tb_alunos.`Codigo_Pessoa` = tb_pessoa.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Descricao' => $lista['Descricao'],
                'Data_Merito' => $lista['Data_Merito'],
                'Codigo_Matricula' => $lista['Codigo_Matricula'],
                'Utilizador_Nome' => $lista['Utilizador_Nome'],
                'Pessoa_Nome' => $lista['Pessoa_Nome'],
                'Codigo_Utilizador' => $lista['Codigo_Utilizador']);
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

    function GetMeritoID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetMeritoID($id);
        return $this->Apagar(array("Codigo" => $id));
    }

    function setDesignacao($designacao) {
        $this->designacao = $designacao;
        if (strlen($designacao) < 4/* && $designacao < (Sistema::AnoAtualBR() + 1) */):
            echo '<div class="alert alert-danger " id="erro_mostrar"> Digite um Ano Correcto ';
            Sistema::VoltarPagina();
            echo '</div>';
        else:
            $this->designacao = $designacao;
        endif;
    }

    function get(Merito $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}
?>