<?php

    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_SCHEMA', 'zmn_sempq_db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_ENCODING', 'utf8');

    $dsn = DB_TYPE. ':host=' .DB_HOST. ';dbname=' .DB_SCHEMA;
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    );

    if( version_compare(PHP_VERSION, '5.3.6', '<') ){
        if( defined('PDO::MYSQL_ATTR_INIT_COMMAND') ){
            $options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES ' .DB_ENCODING;
        }
    }else{
        $dsn .= ';charset=' .DB_ENCODING;
    }

    $conn = @new PDO($dsn, DB_USER, DB_PASSWORD, $options);

    if( version_compare(PHP_VERSION, '5.3.6', '<') && !defined('PDO::MYSQL_ATTR_INIT_COMMAND') ){
        $sql = 'SET NAMES ' .DB_ENCODING;
        $conn->exec($sql);
    }

    // if($conn) {
    //     echo "数据库连接成功！";
    // }
?>
