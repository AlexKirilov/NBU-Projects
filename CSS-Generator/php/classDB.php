<?php
class DB{
	public $_link;
	
	function __construct($dbhost, $dbuser, $dbpassword){
		$this->_link = mysql_connect($dbhost,$dbuser, $dbpassword) or die('no connection to database');
	}
	function selectDB($db){
		mysql_select_db($db,$this->_link);
	}
	function insert($table,array $fields){
		$fields_insert = "";
		$values_insert = "";
		foreach($fields as $field => $value){
			if ($fields_insert != '') {
				$fields_insert .= ',';
				$values_insert .= ',';
			}
			$value = mysql_real_escape_string($value);
			$fields_insert .= "`$field`";
			$values_insert .=" '$value' ";
		}
		$insert_query = "INSERT INTO $table ($fields_insert) VALUES ($values_insert) ";
		$result = $this->query($insert_query);
		return $result;
	}
	function getInsertID(){
		return mysql_insert_id($this->_link);
	}
	function update($table,$fields,$where){
		$update_query = "";
		foreach($fields as $field => $value){
			if ($update_query != '') {
				$update_query .= ',';
			}
			$value = mysql_real_escape_string($value);
			$update_query .= "`$field` ='$value' ";
		}
		$update_query = "UPDATE $table $update_query WHERE $where ";
		$result = $this->query($update_query);
		return mysql_affected_rows($this->_link);
	}
	function delete($table,$where){
		$query = "DELETE FROM $table WHERE $where";
		$this->query($query);
	}
	function query($query){
		return mysql_query($query, $this->_link);
	}
}