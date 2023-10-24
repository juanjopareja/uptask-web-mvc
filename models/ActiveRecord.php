<?php
namespace Model;
class ActiveRecord {

    // DB
    protected static $db;
    protected static $table = '';
    protected static $columnsDB = [];

    // Alerts and Messages
    protected static $alerts = [];
    
    // DB connection
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlert($type, $message) {
        static::$alerts[$type][] = $message;
    }
    // Validation
    public static function getAlerts() {
        return static::$alerts;
    }

    public function validate() {
        static::$alerts = [];

        return static::$alerts;
    }

    // Registers - CRUD
    public function save() {
        $result = '';
        if(!is_null($this->id)) {
            // update
            $result = $this->update();
        } else {
            // create new register
            $result = $this->create();
        }

        return $result;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$table;
        $result = self::querySQL($query);

        return $result;
    }

    // Register search by id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table  ." WHERE id = $id";
        $result = self::querySQL($query);

        return array_shift( $result ) ;
    }

    // Get register
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$table . " LIMIT $limit";
        $result = self::querySQL($query);

        return array_shift( $result ) ;
    }

    // Where search with column 
    public static function where($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
        $result = self::querySQL($query);

        return array_shift( $result ) ;
    }

    // SQL advanced queries
    public static function SQL($SQLquery) {
        $query = $SQLquery;
        $result = self::querySQL($query);

        return $result;
    }

    // Create new register
    public function create() {
        // Data sanitizer
        $attributes = $this->sanitizerAttributes();

        // Insert in DB
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";

        // Query result
        $result = self::$db->query($query);

        return [
           'result' =>  $result,
           'id' => self::$db->insert_id
        ];
    }

    public function update() {
        // Data sanitizer
        $attributes = $this->sanitizerAttributes();

        // Field DB iterator
        $values = [];
        foreach($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $values );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // debug($query);
        $result = self::$db->query($query);
        
        return $result;
    }

    // Delete register - ActiveRecord id
    public function delete() {
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);

        return $result;
    }

    public static function querySQL($query) {
        // DB query
        $result = self::$db->query($query);

        // Result iterator
        $array = [];
        while($register = $result->fetch_assoc()) {
            $array[] = static::createObject($register);
        }

        // memory liberation
        $result->free();

        // result return
        return $array;
    }

    protected static function createObject($register) {
        $object = new static;

        foreach($register as $key => $value ) {
            if(property_exists( $object, $key  )) {
                $object->$key = $value;
            }
        }

        return $object;
    }



    // Identify and DB attribute unification
    public function attributes() {
        $attributes = [];
        foreach(static::$columnsDB as $column) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }

        return $attributes;
    }

    public function sanitizerAttributes() {
        $attributes = $this->attributes();
        $sanitized = [];
        foreach($attributes as $key => $value ) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
    }

    public function synchro($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }
}