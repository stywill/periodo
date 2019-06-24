<?php

/**
 * Description of dicionario_views
 *
 */

/***Essas variaveis podem vir de outra classe de conexão com o  banco*/
$DB_HOST = '';
$DB_USER = '';
$DB_PASS = '';
$DB_DATA = '';

class dicionario_views {

    //put your code here
    /*  */
    protected $DB_HOST;
    protected $DB_USER;
    protected $DB_PASS;
    protected $DB_DATA;

    private function dbg_in($type, $data) {
        $this->_debug_container[$type] .= "{" . date("Y-m-d H:i:s") . "} " . $data . "\r\n";
        switch ($type) {
            case 'OUT': $uf = "<font color=green><strong>OUT</strong></font>";
                break;
            case 'SQL': $uf = "<font color=blue><strong>SQL</strong></font>";
                break;
            case 'WRN': $uf = "<font color=orange><strong>WRN</strong></font>";
                break;
            case 'ERR': $uf = "<font color=red><strong>ERR</strong></font>";
                break;
            default: die('dbg_in TYPE invalido - enviado ' . $type);
                break;
        }
        $this->_debug_container['TIM'] .= $uf . " {" . date("Y-m-d H:i:s") . "} " . $data . "\r\n";
    }

    private function dbg_out() {
        if ($this->_debug_visible) {
            $dbsu = "block";
        } else {
            $dbsu = "none";
        }
        $dbstr = '<br><br><br><br><br><br><br><div align=center style="color:#ddd;"><a href="javascript:$(\'#debugbox\').toggle(\'fast\');">&nbsp;&nbsp;&nbsp;</a></div>'; //toggle no futuro entra aqui
        $dbstr .= '<div id="debugbox" name="debugbox" style="display:' . $dbsu . '; position: relative; left: 0px; width:98%; background-color:#FFF; border: 1px solid #F00; margin: 5px; padding: 5px;">';
        //
        $dbstr .= '<div align=center><strong>dbg</strong></div><br><pre>';
        $dbstr .= '<font color=green><strong>OUT</strong></font><br>' . htmlspecialchars(print_r($this->_debug_container['OUT'], true)) . '<br><br>';
        $dbstr .= '<font color=blue><strong>SQL</strong></font><br>' . htmlspecialchars(print_r($this->_debug_container['SQL'], true)) . '<br><br>';
        $dbstr .= '<font color=orange><strong>WRN</strong></font><br>' . htmlspecialchars(print_r($this->_debug_container['WRN'], true)) . '<br><br>';
        $dbstr .= '<font color=red><strong>ERR</strong></font><br>' . htmlspecialchars(print_r($this->_debug_container['ERR'], true)) . '<br><br><br>';
        $dbstr .= '<font color=black><strong>OrdemExec</strong></font><br>' . print_r($this->_debug_container['TIM'], true) . '<br><br><br>';
        $dbstr .= '<font color=black><strong>_vars</strong></font><br>' . print_r($this->_vars, true) . '<br><br><br>';
        $dbstr .= '</pre>';
        $dbstr .= '<hr size=80 color="#FF0000">';
        $dbstr .= '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';
        $dbstr .= '<hr size=80 color="#FF0000">';
        $dbstr .= '<pre>' . htmlspecialchars(print_r($_SERVER, true)) . '</pre></div>';
        $dbstr .= ''; // /toggle	
        return $dbstr;
    }

    public function __construct() {
        $this->DB_HOST = $this->_database[$this->_database_use]['DB_HOST'];
        $this->DB_USER = $this->_database[$this->_database_use]['DB_USER'];
        $this->DB_PASS = $this->_database[$this->_database_use]['DB_PASS'];
        $this->DB_DATA = $this->_database[$this->_database_use]['DB_DATA'];
        $this->dbg_in('OUT', __FUNCTION__);
        $this->database(1);
        $this->viewOperacoesEstados();
        $this->viewTabloidesUsuarios();
    }

    public function __destruct() {
        $this->dbg_in('OUT', __FUNCTION__);

        $this->database(0);

        if ($this->_debug) {
            echo $this->dbg_out();
        }

        unset($this->_core);
        unset($this->_debug_container);
        unset($this->_debug);
    }

    // versão PHP workaround de classes
    private function core() {
        if (version_compare(PHP_VERSION, "5.0.0", "<")) {
            $this->__construct();
            register_shutdown_function(array($this, "__destruct"));
        }
    }

    public function getDB_HOST() {
        return $this->DB_HOST;
    }

    public function setDB_HOST($DB_HOST) {
        $this->DB_HOST = $DB_HOST;
        return $this;
    }

    public function getDB_USER() {
        return $this->DB_USER;
    }

    public function setDB_USER($DB_USER) {
        $this->DB_HOST = $DB_USER;
        return $this;
    }

    public function getDB_PASS() {
        return $this->DB_PASS;
    }

    public function setDB_PASS($DB_PASS) {
        $this->DB_PASS = $DB_PASS;
        return $this;
    }

    public function getDB_DATA() {
        return $this->DB_DATA;
    }

    public function setDB_DATA($DB_DATA) {
        $this->DB_DATA = $DB_DATA;
        return $this;
    }

    private function database($action) {
        $this->dbg_in('OUT', __FUNCTION__);
        if ($action) {
            $this->_db = mysqli_connect($this->getDB_HOST(), $this->getDB_USER(), $this->getDB_PASS(), $this->getDB_DATA());

            if (mysqli_connect_errno()) {
                $this->dbg_in('ERR', 'Falha conexao com SQL - (' . mysqli_connect_errno() . ') : ' . mysqli_connect_error());
            } else {
                $this->dbg_in('SQL', __FUNCTION__ . ' CONNECT');
            }
            // ajusta acentuação
            mysqli_set_charset($this->_db, 'utf8');
        } else {
            mysqli_close($this->_db);
            $this->dbg_in('SQL', __FUNCTION__ . ' CLOSE');
        }

        return 1;
    }

    private function viewExecute($view) {
        mysqli_query($this->_db, $view);
    }

    private function viewOperacoesEstados() {
        $view = "CREATE OR REPLACE  VIEW nome_para view AS "
                . "consulta vai aqui;";
        return $this->viewExecute($view);
    }

}
