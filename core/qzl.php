<?php
namespace core;
use core\lib\log;
class Qzl{
    public static $classMap = array();
    public $assign;
    static public function run(){
        \core\lib\log::init();//启动日志
        //加载路由
        $route = new \core\lib\route();

        //加载控制器
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if (is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
            log::log('ctrl:'.$ctrlClass.'    '.'action:'.$action);
        }else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    /**
     * 自动加载类库
     */
    static public function load($class){
        if (isset($classMap[$class])){
            return true;
        }else {
            $class = str_replace('\\', '/', $class);
            $file = QGFrame.'/'.$class.'.php';
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = $class;//将这个类添加到classMap中
            }else {
                return false;
            }
        }
    }

    //传值
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    //显示视图
    public function display($file){
        /* $file = APP.'/views/'.$file;
        if (is_file($file)){
            extract($this->assign);//将数组中的键值变成单独的变量
            include $file;
        } */
        $filePath = APP.'/views/'.$file;
        if (is_file($filePath)){
            //extract($this->assign);//将数组中的键值变成单独的变量

            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/views/');
            $twig = new \Twig_Environment($loader, array(
            'cache' => QGFrame.'/log/twig',
            'debug'=>DEBUG,
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign?$this->assign:array());
        }
    }
}
?>