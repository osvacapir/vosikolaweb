<?php

Class DefEscola extends Conexao {

    private $Codigo;
    private $Codigo_Ano_Lectivo;
    private $Codigo_Escola;
    private $Num_Turmas;

    function __construct() {
        parent::__construct();
        $this->setTabela(Tab::DEF_ESC);
    }

    function Grava($obj) {
        if (isset($obj['Codigo']) && $obj['Codigo'] > 0) {
            return $this->Editar($obj, array('Codigo' => $obj['Codigo']), $this->tabela);
        } elseif (!isset($valores['Codigo'])) {
            unset($obj['Codigo']);
            return $this->Inserir($obj);
        }
    }

    function GetDefEscola() {
        $query = "SELECT 
            {$this->tabela}.Num_Turmas,
            {$this->tabela}.Codigo_Escola,
                 {$this->tabela}.Codigo_Ano_Lectivo,
                 {$this->tabela}.Codigo 
                     FROM
            `{$this->tabela}` {$this->tabela}
            INNER JOIN `".Tab::ANO."` ".Tab::ANO." ON {$this->tabela}.`Codigo_Ano_Lectivo` = ".Tab::ANO.".`Codigo`
            INNER JOIN `".Tab::ESCOLA."` ".Tab::ESCOLA." ON {$this->tabela}.`Codigo_Escola` = ".Tab::ESCOLA.".`Codigo`";
        $query .= " WHERE {$this->tabela}.Codigo_Escola=" . $_SESSION['SYS']['CodEscola'] . " AND {$this->tabela}.Codigo_Ano_Lectivo=" . $_SESSION['SYS']['CodAno'];
        $query .= " ORDER BY Codigo DESC";
      
        
        $this->ExecutaSQL($query);
        $this->GetLista();
    }
    function GetDefEscolaID() {
        $query = "SELECT 
            {$this->tabela}.Num_Turmas,
            {$this->tabela}.Codigo_Escola,
                 {$this->tabela}.Codigo_Ano_Lectivo,
                 {$this->tabela}.Codigo 
                     FROM
            `{$this->tabela}` {$this->tabela}
            INNER JOIN `".Tab::ANO."` ".Tab::ANO." ON {$this->tabela}.`Codigo_Ano_Lectivo` = ".Tab::ANO.".`Codigo`
            INNER JOIN `".Tab::ESCOLA."` ".Tab::ESCOLA." ON {$this->tabela}.`Codigo_Escola` = ".Tab::ESCOLA.".`Codigo`";
        $query .= " WHERE {$this->tabela}.Codigo_Escola=" . $_SESSION['SYS']['CodEscola'] . " AND {$this->tabela}.Codigo_Ano_Lectivo=" . $_SESSION['SYS']['CodAno'];
        $query .= " ORDER BY Codigo DESC";
      
        
        $this->ExecutaSQL($query);
        $this->GetLista();
    }

    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'Codigo' => $lista['Codigo'],
                'Codigo_Escola' => $lista['Codigo_Escola'],
                'Codigo_Ano_Lectivo' => $lista['Codigo_Ano_Lectivo'],
                'Num_Turmas' => $lista['Num_Turmas']);
            $i++;
        endwhile;
    }

}

?>