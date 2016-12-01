<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/31
 * Time: 16:49
 */
class Table
{
    protected $db;
    protected $tableName;

    function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->db = new SQLite3(DB_ROOT);
        $this->db->exec("PRAGMA foreign_keys = ON;");
    }

    function query($sql)
    {
        $results = $this->db->query($sql);
        return $this->generateResult($results);
    }

    function findById($id)
    {
        $results = $this->db->query("select * from " . $this->tableName . " where id = '" . $id . "'");
        return $this->generateResult($results)[0];
    }

    function find($name, $value)
    {
        $results = $this->db->query("select * from " . $this->tableName . " where ".$name." =  '" . $value. "'");
        return $this->generateResult($results);
    }
    function findInGroup($data){
        $sql = sprintf("select * from %s where %s",$this->tableName,$this->formatWhere($data));
        return $this->generateResult($this->db->query($sql));
    }
    function getAll(){
        $results = $this->db->query("select * from " . $this->tableName);
        return $this->generateResult($results);
    }
    function search($name,$value){
        if($value!=''){
            $results = $this->db->query("select * from " . $this->tableName . " where ".$name." like  '%" . $value. "%'");
            return $this->generateResult($results);
        }else{
            return array();
        }
    }
    function deleteById($id){
        $this->db->exec("delete from " . $this->tableName . " where id = '" . $id. "'");
    }
    function delete($data){
        $sql = sprintf("delete from %s where %s",$this->tableName,$this->formatWhere($data));
        $this->db->exec($sql);
    }
    function insert($data){
        $sql = sprintf("insert into %s %s", $this->tableName, $this->formatInsert($data));
        $this->db->exec($sql);
    }
    function  generateResult($reData){
        $result = array();
        while ($row = $reData->fetchArray()) {
            $result[] = $row;
        }
        return $result;
    }
    public function update($id, $data)
    {
        $sql = sprintf("update %s set %s where id = %d", $this->tableName, $this->formatUpdate($data), $id);
        $this->db->exec($sql);
    }
    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("%s", $key);
            $values[] = sprintf("'%s'", $value);
        }

        $field = implode(',', $fields);
        $value = implode(',', $values);

        return sprintf("(%s) values (%s)", $field, $value);
    }
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("%s = '%s'", $key, $value);
        }

        return implode(',', $fields);
    }
    protected function formatWhere($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("%s = '%s'", $key, $value);
        }
        return implode(' AND ', $fields);
    }
}