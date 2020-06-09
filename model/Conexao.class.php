<?php

Class Conexao extends Config {

    private $host, $user, $senha, $banco, $sql;
    protected $obj, $itens = array(), $prefix;
    public $paginacao_links, $totalpags, $limite, $inicio, $pdo;
    public $alert = "", $tabela = "";

    function __construct() {
        $this->host = self::BD_HOST;
        $this->user = self::BD_USER;
        $this->senha = self::BD_SENHA;
        $this->banco = self::BD_BANCO;
        $this->prefix = self::BD_PREFIX;
        $this->itens = array();
        $this->sql = "";
        try {
            if ($this->Conectar() == null) {
                $this->Conectar();
            }
        } catch (PDOException $e) {
            exit($e->getMessage() . '<br><h2> Erro ao conectar com o banco de dados! </h2>');
        }
    }

    private function Conectar() {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        $link = new PDO("mysql:host={$this->host};dbname={$this->banco}",
                $this->user, $this->senha, $options);
        return $link;
    }

    function ExecutaSQL($query, array $params = NULL) {

        $this->pdo = $this->Conectar();
        try {
            $this->pdo->beginTransaction();

            $this->obj = $this->pdo->prepare($query);
            if (!is_null($params)) {
                if (count($params) > 0) {
                    /** @var type $key */
                    foreach ($params as $key => $value) {
                        $this->obj->bindvalue($key, $value);
                    }
                }
            }
            $this->obj->execute();

            return $this->pdo->commit();
        } catch (PDOException $exc) {
            $this->setAlert('Erro de Com o Submit</br><h2>Codigo</h2></br>' . $exc->getCode() . '</br> <h2>Message:</h2>' . $exc->getMessage());
            // echo '' . $this->alert;
        }
    }

    function ExecutaSQL_massa($lista) {

        $this->pdo = $this->Conectar();
        try {
            $this->pdo->beginTransaction();
            foreach ($lista as $key => $value) {

                $this->obj = $this->pdo->prepare($value[$key]);
                if (!is_null($lista[$key])) {
                    if (count($params) > 0) {
                        /** @var type $key */
                        foreach ($params as $key => $value) {
                            $this->obj->bindvalue($key, $value);
                        }
                    }
                }
                $this->obj->execute();
            }
            return $this->pdo->commit();
        } catch (PDOException $exc) {
            $this->setAlert('Erro de Com o Submit\n' . $exc->getMessage() . '\n<h2> Erro ao conectar com o banco de dados! </h2>');
            echo '' . $this->alert;
        }
    }

    public function __destruct() {
        
    }

    function ListarDados() {
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }

    function TotalDados() {
        return $this->obj->rowCount();
    }

    function GetItens() {
        return $this->itens;
    }

    function GetItem() {
        return $this->itens[1];
    }

    function PaginacaoLinks($campo, $tabela) {
        $pag = new Paginacao();
        $pag->GetPaginacao($campo, $tabela);
        $this->paginacao_links = $pag->link;

        $this->totalpags = $pag->totalpags;
        $this->limite = $pag->limite;
        $this->inicio = $pag->inicio;

        $inicio = $pag->inicio;
        $limite = $pag->limite;

        if ($this->totalpags > 0) {
            return " limit {$inicio}, {$limite}";
        } else {
            return " ";
        }
    }

    protected function Paginacao($paginas = array()) {
        $pag = '<ul class="pagination">';
        $pag .= '<li><a href="?p=1"><i class="fas fa-toggle-left mr-2"></i></a></li>';

        foreach ($paginas as $p):
            $pag .= '<li>'
                    . '<a href="?p=' . $p . '">' . $p . ', </a>'
                    . '</li>';
        endforeach;

        $pag .= '<li><a href="?p=' . $this->totalpags . '"> ...' . $this->totalpags . '<i class="fas fa-toggle-right ml-2"></i></a></li>';

        $pag .= '</ul>';

        if ($this->totalpags > 1) {
            return $pag;
        }
    }

    function ShowPaginacao() {
        return $this->Paginacao($this->paginacao_links);
    }

    function setTabela($table) {
        $this->tabela = /* $this->prefix . */ $table;
    }

    function setAlert($sms = null, $tipo = 0, $temp = null) {
        $this->alert = "";
        $titulo = "";
        if (!is_null($sms)) {
            switch ($tipo) {
                case 0:
                    $class = "alert alert-danger";
                    $titulo = "Ops";
                    break;
                case 1:
                    $class = "alert alert-warning";
                    $titulo = "Att";
                    break;
                case 2:
                    $class = "alert alert-success";
                    $titulo = "Boas";
                    break;
            }
            $role = '';
            if (is_null($temp)) {
                $role = 'alert_temp';
                $class .= ' ' . $role;
            } else {
                $role = 'alert';
            }

            $this->alert = "
                        <div class ='$class small text-muted' role = 'role' id='$role'>
                            <span>
                                <button type = 'button' class = 'close' data-dismiss = '$role' aria-label = 'Close'>
                                    <span aria-hidden = 'true'>&times;</span>
                                </button>
                            </span>
                            <h4 class='alert-heading py-0'>$titulo!</h4>
                            <hr class='py-0'>
                            <h6 class='py-0'>" . $sms . "</h6>
                        </div>";
        } else {
            $this->alert = "";
        }
        $sms = null;
        $role = '';
        return $this->alert;
    }

    function Primeiro($obj) {
        if (isset($obj[0])) {
            return $obj[0];
        } else
            return null;
    }

    function Ultimo() {
        $query = "SELECT max(Codigo) AS Ultimo FROM {$this->tabela}";
        $this->ExecutaSQL($query, $campos_value);
        return $this->obj->fetchObject();
    }

    function UltimoID() {
        $query = "SELECT LAST_INSERT_ID FROM {$this->tabela}";
        $this->ExecutaSQL($query, $campos_value);
        return $this->obj->fetchObject();
    }

    function Inserir($obj) {
        $query = "INSERT INTO {$this->tabela}(" . implode(",", array_keys((array) $obj)) . ") VALUES('" . implode("','", array_values((array) $obj)) . "')";
        if ($this->ExecutaSQL($query) > 0) {
            return true;
        } else
            return false;
    }

    function Editar($obj, $cond) {
        foreach ($obj as $ind => $val) {
            $dados[] = "{$ind}= " . (is_null($val) ? " NULL " : "'{$val}'");
        }
        foreach ($cond as $ind => $val) {
            $where[] = "{$ind}= " . (is_null($val) ? " NULL " : "'{$val}'");
        }
        $query = "UPDATE {$this->tabela} SET " . implode(',', $dados) . " WHERE " . implode(' AND ', $where);
        if ($this->ExecutaSQL($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Apagar($cond) {
        foreach ($cond as $ind => $val) {
            $where[] = "{$ind}= " . (is_null($val) ? " NULL " : "{$val}");
        }
        $query = "DELETE FROM {$this->tabela} WHERE " . implode(' AND ', $where);

        if ($this->ExecutaSQL($query) > 0) {
            return true;
        } else
            return false;
    }

    function setObject($obj, $Value, $Exists = true) {

        if (is_object($obj)) {

            if (count($Value) > 0) {

                foreach ($Value as $in => $val) {
                    if (property_exists($obj, $in) || $Exists) {
                        $obj->$in = "" . $val['$in'];
                    }
                }
            }


            return $obj;
        } else
            return null;
    }

}

function modalApagar($user, $comando = '#') {

    $modal = "<div class='modal fade' id='apagaModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Deseja realmente apagar?</h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
            <div class='modal-body'>

                Olá<strong> $user</strong>Clique em Confirmar para apagar.</div>
            <div class='modal-footer'>
                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancelar</button>
                <a class='btn btn-primary' href='$comando'>Confirmar</a>
            </div>
        </div>
    </div>
</div>";
    return $modal;
}

?>