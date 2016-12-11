<?php
/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */
//获取当前框架所在的目录
define('QGFrame', realpath(dirname(__FILE__).'/'));
//核心文件所处的目录
define('CORE', QGFrame.'/core');
//项目文件所处的目录
define('APP', QGFrame.'/app');
//模块所处的目录
define('MODULE', 'app');
include 'vendor/autoload.php';
//是否开启调试模式
define('DEBUG', true);
if (DEBUG){
    $whoops = new \Whoops\Run();
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();

    //打开显示错误的开关
    ini_set('display_error', 'On');
}else {
    ini_set('display_error', 'Off');
}
//加载函数库
include CORE.'/common/function.php';
//加载框架的核心文件
include CORE.'/qzl.php';

//加载路由类(new一个类，当类不存在是会触动次方法)
spl_autoload_register('\core\Qzl::load');

\core\Qzl::run();
?>