<?php
namespace core\lib;

/**
 * 加载配置文件
 * @author Qzl
 */
class conf{
    static public $conf = array();//保存配置文件信息
    //加载配置文件
    static public function get($name,$file){
        /**
         * 1、判断配置文件是否存在
         * 2、判断对应的配置是否存在
         * 3、缓存配置
         */
        if (isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else {
            $path = QGFrame.'/core/config/'.$file.'.php';
            //判断文件是否存在
            if (is_file($path)){
                $conf = include $path;
                //判断对应的配置是否存在
                if (isset($conf[$name])){
                    //缓存配置文件
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else {
                    throw new \Exception('没有这个配置项'.$name);
                }
            }else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }

    //加载多个配置
    static public function all($file){
        //如果已经加载了，则不在加载
        if (isset(self::$conf[$file])){
            return self::$conf[$file];
        }else {
            $path = QGFrame.'/core/config/'.$file.'.php';
            //判断文件是否存在
            if (is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            }else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }
}
?>