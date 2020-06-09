<?php

Class AnoLectivo extends Conexao {

    private $codigo,
            $designacao,
            $estado;
    private $sql = "";

    function __construct() {

        parent::__construct();
        $this->setTabela(Tab::ANO);
        $this->sql = "SELECT {$this->tabela}.Codigo AS Codigo,{$this->tabela}.Designacao AS Designacao,{$this->tabela}.Codigo_Estado AS Codigo_Estado,tb_estado.Designacao AS Estado FROM {$this->tabela} INNER JOIN tb_estado ON tb_estado.Codigo={$this->tabela}.Codigo_Estado";
    }

    function Preparar($codigo, $designacao, $estado) {
        $this->SetCodigo($codigo);
        $this->SetDesignacao($designacao);
        $this->setEstado($estado);
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDesignacao() {
        return $this->designacao;
    }

    function getEstado() {
        return $this->estado;
    }

    function GetAnoLectivos() {
        $query = $this->sql . " ORDER BY Designacao DESC";
        $query .= $this->PaginacaoLinks("Codigo", $this->tabela);
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    function GetAnoLectivoID($id) {
        $query = $this->sql . " WHERE {$this->tabela}.Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Designacao' => $lista['Designacao'],
                'Codigo_Estado' => $lista['Codigo_Estado'],
                'Estado' => $lista['Estado']
            );
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
        $this->GetAnoLectivoID($id);
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

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    /* function InserirM($valores_inserir) {

      $valores_campos = array_values($valores_inserir);
      $valores = implode("','", $valores_campos);
      if ($ano->Inserir($valores_inserir, 'tb_ano_lectivo')) {
      $ano->erro = array("COD" => 1, "SMS" => "  Gravou '" . $valores_inserir['Designacao'] . "'");
      } else {

      $ano->erro = array("COD" => 2, "SMS" => "  Não Gravou '" . $valores_inserir['Designacao'] . "' Talvez já esteja gravado");
      }
      }
     */

    function get(AnoLectivo $obj) {
        $query = $this->Primeiro($this->ExecutaSQL("SELECT *FROM {$this->tabela} WHERE Codigo='{$obj->GetCodigo()}'"));
        $this->setObject($obj, $query);
    }

}

?>