<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/31
 * Time: 16:49
 */
class Table
{
    private $db;
    private $tableName;

    function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->db = new SQLite3('resources/OriSport.db');
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
    function getAll(){
        $results = $this->db->query("select * from " . $this->tableName);
        return $this->generateResult($results);
    }
    function search($name,$value){
        $results = $this->db->query("select * from " . $this->tableName . " where ".$name." like  '%" . $value. "%'");
        return $this->generateResult($results);
    }
    function deleteById($id){
        $this->db->exec("delete * from " . $this->tableName . " where id = '" . $id. "'");
    }
    function insert($data){
        $sql = sprintf("insert into %s %s", $this->tableName, $this->formatInsert($data));

        return $this->query($sql);
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
        $sql = sprintf("update %s set %s where id = '%s'", $this->tableName, $this->formatUpdate($data), $id);

        return $this->query($sql);
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
}