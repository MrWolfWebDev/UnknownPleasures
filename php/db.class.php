<?php

include 'news.class.php';

// Database class (Using PDO)
class Database {

    protected $host = DB_HOST;
    protected $user = DB_USER;
    protected $pass = DB_PASS;
    protected $dbname = DB_NAME;
    protected $dbh;
    protected $error;
    protected $stmt;

    public function __construct() {
        // Set DSN
        $dsn = DB_TYPE . ':host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create a new PDO istance
        try {
            $this->dbh = new PDO( $dsn, $this->user, $this->pass, $options );
        }
        // Catch any errors
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
        }
    }

    public function query( $query ) {
        $this->stmt = $this->dbh->prepare( $query );
    }

    public function bind( $param, $value, $type = NULL ) {
        if ( is_null( $type ) ) {
            switch ( true ) {
                case is_int( $value ):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool( $value ):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null( $value ):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue( $param, $value, $type );
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultset() {
        $this->execute();
        return $this->stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch( PDO::FETCH_ASSOC );
    }

    // Number of affected rows
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

    // Transaction methods
    public function beginTransaction() {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction() {
        return $this->dbh->commit();
    }

    public function cancelTransaction() {
        return $this->dbh->rollBack();
    }

    public function debugDumpParams() {
        return $this->stmt->debugDumpParams();
    }

}

// DBNews class (Extends Database class) (Using PDO)

class TableNews extends Database {

    /**
     *
     * CRUD Methods
     */
    protected $selectQuery = "SELECT * FROM news";
    protected $insertQuery = "INSERT INTO `news` (`Data`, `Titolo`, `Testo`, `Foto`, `DataIns`) VALUES (:data, :titolo, :testo, :foto, :dataIns)";
    protected $updateQuery = "UPDATE news SET Data = :data, Titolo = :titolo, Testo = :testo, Foto = :foto, DataIns = :dataIns WHERE ID = :iD";
    protected $deleteQuery = "DELETE FROM `news` where `ID` = :iD";
    protected $adminQuery  = "SELECT `ID` FROM `admin` WHERE `User`=:user AND `Password`=SHA1(:pass)";
    protected $titleQuery  = "SELECT `Titolo`,`ID`,`DataIns` from news";


    // Used class
    protected $class = "News";
    // Table fields
    protected $fields = array(
        "Data",
        "Titolo",
        "Testo",
        "Foto",
        "DataIns"
    );
    
     public function Title() {
        $this->query( $this->titleQuery );
        $this->execute();

        return $this->stmt;
    }
    
    // Fetch an array of News objects (defined in news.class.php)
    public function fetchAll() {
        $this->query( $this->selectQuery );
        $this->execute();

        return $this->stmt->fetchAll( PDO::FETCH_CLASS, $this->class );
    }

    public function fetchSome( $num = 1 ) {
        $this->query( $this->selectQuery . "LIMIT 0, $num" );

        $this->bind( ':num', $num );
        try {
            $this->execute();
        }
        // Catch any errors
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
        }

        return $this->stmt->fetchAll( PDO::FETCH_CLASS, $this->class );
    }

    public function insert( $obj ) {
        $this->query( $this->insertQuery );

        if ( is_array( $obj ) ) {
            $this->bindArray( $obj );
            $this->bind( ':dataIns', date( "Y-m-d" ) );
        }
        elseif ( is_object( $obj ) ) {
            if ( get_class( $obj ) == $this->class ) {
                $this->bindObject( $obj );
                $this->bind( ':dataIns', date( "Y-m-d" ) );
            }
        }
        else {
            echo "Invalid parameters (must be array or $this->class type)";
        }


        try {
            $this->execute();
            return true;
        }
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function delete( $ID ) {
        if ( is_int( $ID ) ) {
            $this->query( $this->deleteQuery );

            $this->bind( ':iD', $ID );
            try {
                $this->execute();
                return true;
            }
            catch ( PDOException $e ) {
                $this->error = $e->getMessage();
                return $this->error;
            }
        }

        if ( is_array( $ID ) ) {
            foreach ( $ID as $id ) {
                $this->query( $this->deleteQuery );

                $this->bind( ':iD', $id );
                try {
                    $this->execute();
                    return true;
                }
                catch ( PDOException $e ) {
                    $this->error = $e->getMessage();
                    return $this->error;
                }
            }
        }
    }

    
     //
    public function admin($user,$pass){
        $this->query( $this->adminQuery );
        
        $this->bind( ':user', $user );
        $this->bind( ':pass', $pass );
              
        try {
            $this->execute();
            $count= $this->rowCount();
        }
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
            return $this->error;
        }
        
        return $count;
    }
    
    public function update( $obj, $ID ) {
        $this->query( $this->updateQuery );

        $this->bind( ':iD', $ID );
        $this->bind( ':data', $obj->Data );
        $this->bind( ':titolo', $obj->Titolo );
        $this->bind( ':testo', $obj->Testo );
        $this->bind( ':foto', $obj->Foto );
        $this->bind( ':dataIns', date( "Y-m-d" ) );
        try {
            $this->execute();
            return true;
        }
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    // Utilities

    public function bindArray( $obj ) {
        foreach ( $this->fields as $field ) {
            $this->bind( ':' . lcfirst( $field ), $obj[$field] );
        }
    }

    public function bindObject( $obj ) {
        foreach ( $this->fields as $field ) {
            $this->bind( ':' . lcfirst( $field ), $obj->$field );
        }
    }

}
