<?php
class Database
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "crud";
    private $mysqli = "";
    private $con = false;
    private $errMsg = array();
    public function __construct()
    {
        if (!$this->con) {
            $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->dbname);
            if ($this->mysqli->connect_error) {
                array_push($this->errMsg, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }
    public function insert($tableName, $values = array())
    {
        if ($this->tableExist($tableName)) {
            $tableCol = implode(',', array_keys($values));
            $tableVal = implode("','", $values);
            $sql = "insert into $tableName($tableCol) values('$tableVal')";
            if ($this->mysqli->query($sql)) {
                array_push($this->errMsg, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->errMsg, $this->mysqli->error);
                return false;
            }
        } else {
            echo "helllllooo";
        }
    }
    public function update($tableName, $values = array(), $where = null)
    {
        if ($this->tableExist($tableName)) {
            $args = array();
            foreach ($values as $key => $value) {
                $args[] = "$key ='$value'";
            }
            $sql = "update $tableName Set " . implode(',', $args);
            if ($where != null) {
                $sql .= " where $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->errMsg, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->errMsg, $this->mysqli->error);
                return false;
            }
        }
    }
    public function delete($tableName,$where=null)
    {
    if($this->tableExist($tableName)){
        $sql = "delete from $tableName";
        if($where !=null){
            $sql .= " where $where"; 
        }
        // echo $sql;
        if ($this->mysqli->query($sql)) {
            array_push($this->errMsg, $this->mysqli->affected_rows);
            return true;
        } else {
            array_push($this->errMsg, $this->mysqli->error);
            return false;
        }
    }else{
        return false;
    }
    }
    public function select()
    {
        
    }
    public function __destruct()
    { {
            if ($this->con) {
                $this->mysqli->close();
            } else {
                return false;
            }
        }
    }
    private function tableExist($table)
    {
        $sql = "show tables from $this->dbname LIKE '$table'";
        $tableDB = $this->mysqli->query($sql);
        if ($tableDB) {
            if ($tableDB->num_rows == 1) {
                return true;
            } else {
                array_push($this->errMsg, $table . "table does not exist.");
                return false;
            }
        }
    }
    public function getResult()
    {
        $val = $this->errMsg;
        $this->errMsg = array();
        return $val;
    }
}
$dbobj = new Database();
// $dbobj->insert('crudtest', ['name' => 'Ramu', 'email' => 'Ramu@gmail.com', 'phone' => '895784545', 'password' => 'Ramu#1214']);
// echo "insert result is: ";
// print_r($dbobj->getResult());
$dbobj->delete('crudtest', 'id="10"');
?>