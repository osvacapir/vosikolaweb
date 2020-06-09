<?php
Class TbEscolaSistema extends Conexao {

    private $codigoCoordSubs;
    private $codigo;
    private $codigoSubSistema;
    private $codigoEscola;

    public function getCodigoCoordSubs() {
        return $codigoCoordSubs;
    }

    public function setCodigoCoordSubs($codigoCoordSubs) {
        $this->codigoCoordSubs = $codigoCoordSubs;
    }

    public function getCodigo() {
        return $codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigoSubSistema() {
        return $codigoSubSistema;
    }

    public function setCodigoSubSistema($codigoSubSistema) {
        $this->codigoSubSistema = $codigoSubSistema;
    }

    public function getCodigoEscola() {
        return $codigoEscola;
    }

    public function setCodigoEscola($codigoEscola) {
        $this->codigoEscola = $codigoEscola;
    }
    
    function __construct() {
        parent::__construct();
        $this->setTabela('escola_sistema');
    }

    function GetEscolaSistema() {
        $query = "SELECT
            tb_subsistema.`Designacao` AS Subsistema_Designacao,
            tb_escola_sistema.`Codigo_Escola` AS Codigo_Escola,
            tb_escola_sistema.`Codigo_SubSistema` AS Codigo_SubSistema,
            tb_escola_sistema.`Codigo_Coord_Subs` AS Codigo_Coord_Subs,
            tb_escola_sistema.`Vaga_Alunos` AS Vaga_Alunos,
            tb_escola_sistema.`Codigo` AS Codigo,
            tb_escola.`Designacao` AS Escola_Nome
       FROM
            `tb_subsistema` tb_subsistema INNER JOIN `tb_escola_sistema` tb_escola_sistema ON tb_subsistema.`Codigo` = tb_escola_sistema.`Codigo_SubSistema`
            INNER JOIN `tb_escola` tb_escola ON tb_escola_sistema.`Codigo_Escola` = tb_escola.`Codigo`";
        $query .= " ORDER BY Codigo DESC";
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo_Escola' => $lista['Codigo_Escola'],
                'Codigo_SubSistema' => $lista['Codigo_SubSistema'],
                'Codigo_Coord_Subs' => $lista['Codigo_Coord_Subs'],
                'Escola_Nome' => $lista['Escola_Nome'],
                'Vaga_Alunos' => $lista['Vaga_Alunos'],
                'Subsistema_Designacao' => $lista['Subsistema_Designacao'],
                'Codigo' => $lista['Codigo']);
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

    function GetEscolaSistemaID($id) {
        $query = "SELECT *FROM {$this->tabela} ";
        $query .= "WHERE Codigo=:Codigo";
        $params = array(':Codigo' => (int) $id);
        $this->ExecutaSQL($query, $params);
        $this->GetLista();
    }

    function Apaga($id) {
        $this->GetEscolaSistemaID($id);
        return $this->Apagar(array("Codigo" => $id));
    } 
}
?>