<?php
/**
 * 输出变量或数组
 * @param unknown $var
 */
function p($var){
    if (is_bool($var)){
        var_dump($var);
    }elseif (is_null($var)){
        var_dump(NULL);
    }else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;
            border-radius:5px;background:#F5F5F5;border:1px solid #aaa;
            font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
    }
}

/**
 *
 * @param unknown $name 对应值
 * @param unknown $default 默认值
 * @param unknown $fitt 过滤方法
 */
function post($name,$default=false,$fitt=false){
    if (isset($_POST[$name])){
        if ($fitt){
            switch ($fitt){
                case 'int':
                    if (is_numeric($_POST[$name])){
                        return $_POST[$name];
                    }else {
                        return $default;
                    }
                    break;
                default:;
            }
        }else {
            return $_POST[$name];
        }
    }else {
        return $default;
    }
}

function get($name,$default=false,$fitt=false){
    if (isset($_GET[$name])){
        if ($fitt){
            switch ($fitt){
                case 'int':
                    if (is_numeric($_GET[$name])){
                        return $_GET[$name];
                    }else {
                        return $default;
                    }
                    break;
                default:;
            }
        }else {
            return $_GET[$name];
        }
    }else {
        return $default;
    }
}

/**
 * 跳转页面的方法
 * @param str $url
 */
function jump($url){
    header('Location:'.$url);
    exit();
}
?>











