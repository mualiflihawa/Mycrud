<?php 

require_once("config.php");

class app extends config{

    private $db;

    //connect to DB
    public function __construct(){

        $mysqli = new mysqli($this->config_DB["hostname"],$this->config_DB["username"],$this->config_DB["password"],$this->config_DB["database"]);
		if($mysqli->connect_errno){
			echo "Show Error : ".$mysqli->connect_error; 
		}

		$this->db = $mysqli;
    }

    //query mysqli
    public function query($data=""){
        return $this->db->query($data);
    }

    //insert query mysqli
    public function insert($table="",$data=""){
        $keys=[];
        $rows=[];
        foreach($data as $key => $row){
            array_push($keys,$key);
            
            $add_quote_row="'".$row."'";
            array_push($rows,$add_quote_row);
        }
        $add_koma_keys=implode(",",$keys);
        $add_koma_rows=implode(",",$rows);

        return $this->db->query("INSERT INTO $table($add_koma_keys) VALUES($add_koma_rows)");
    }

    //select query mysqli
    public function get($table=""){
        return $this->db->query("SELECT * FROM $table");
    }

    //delete query mysqli
    public function delete($table="",$data=""){
        foreach($data as $key => $row){
            $where_data_primary = $key . "='" . $row . "'" ;
        }
        
        return $this->db->query("DELETE FROM $table WHERE $where_data_primary");
    }

    //update query mysqli
    public function update($table="",$data="",$primary=""){

        $move_data=[];

        //data
        foreach($data as $key => $row){
            $data_split = $key . "='" . $row . "' ";
            array_push($move_data,$data_split);
        }
        //primary
        foreach($primary as $key => $row){
            $primary_split = $key . "='" . $row . "'";
        }

        //result
        $result_data = implode(",",$move_data);
        $result_primary = $primary_split;

        return $this->db->query("UPDATE $table SET $result_data WHERE $result_primary");
    }

}


?>