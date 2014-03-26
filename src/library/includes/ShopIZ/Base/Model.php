<?php

namespace ShopIZ\Base;

class Model extends \Phalcon\Mvc\Model
{
    protected static $_inst = array();

    protected static $db = null;
    
    protected static $modelsManager = null;

    public $tablePrefix = "ok_";
    
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
    
    static public function inst()
    {
        //
        if (!isset(self::$_inst[static::$modelName])) {
            self::$_inst[static::$modelName] = new static::$modelName();
        }

        return self::$_inst[static::$modelName];
    }
}
