<?php

namespace ShopIZ\Base;

class Model extends \Phalcon\Mvc\Model
{
    protected static $_inst = array();

    protected static $db = null;

    protected static $modelsManager = null;

    public $tablePrefix = "";

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        if ($this->tableName != null) {
            $this->setSource("{$this->tablePrefix}{$this->tableName}");

            $this->tableName = "{$this->tablePrefix}{$this->tableName}";
        }

        $this->di = $this->getDI();
        $this->db = $this->di->get('db');
        $this->modelsManager = $this->di->get('modelsManager');
    }

    public function insert($colums)
    {
        $flag = $this->db->insert($this->tableName, array_values($colums), array_keys($colums));

        if ($flag) {
            $insertId = $this->db->lastInsertId();
        } else {
            $insertId = false;
        }

        return $insertId;

    }

    // public function update($colums, $whereCondition = null, $dataTypes = null)
    // {
    //     $flag = $this->db->update($this->tableName, array_keys($colums), array_values($colums), $whereCondition, $dataTypes);

    //     return $flag;

    // }

    public function delete($whereCondition = null, $placeholders = null, $dataTypes = null)
    {
        $flag = $this->db->delete($this->tableName, $whereCondition, $placeholders, $dataTypes);

        return $flag;

    }

    static public function inst()
    {
        $className = get_called_class();
        if (!isset(self::$_inst[$className])) {
            self::$_inst[$className] = new $className();
        }

        return self::$_inst[$className];
    }
}
