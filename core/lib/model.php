<?php
namespace core\lib;
use core\lib\conf;
class model extends \medoo{
    public function __construct(){
        //加载数据库配置文件
        /* $database = conf::all('database');
        try {
            parent::__construct($database['DSC'], $database['USERNAME'], $database['PASSWD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        } */
        $database = conf::all('database');
        parent::__construct($database);
    }
}
?>