<?php
namespace core\lib;
class route{
    public $ctrl;//控制器
    public $action;//方法

    public function __construct(){
        //xxx.com/index/index
        /**
         * 1、隐藏index.php
         * 2、获取URL参数部分
         * 3、返回对应控制器和方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/QGFrame/' ){
            // /index/index
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            unset($patharr[0]);
            if (isset($patharr[1])){
                $this->ctrl = $patharr[1];
                unset($patharr[1]);
            }
            if (isset($patharr[2])){
                $this->action = $patharr[2];
                unset($patharr[2]);
            }else {
                $this->action = conf::get('ACTION', 'route');
            }
            //url的多余部分转换成 GET参数
            //index/index/id/1/str/2/test/3
            $count = count($patharr) + 3;
            $i = 3;
            while ($i < $count){
                if (isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i+1];//以键值的形式保存在_GET中
                }
                $i += 2;
            }
        }else {
            //设置默认的控制器和方法
            $this->ctrl = conf::get('CTRL', 'route');
            $this->action = conf::get('ACTION', 'route');
        }
    }
}
?>








