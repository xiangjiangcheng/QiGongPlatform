<?php
namespace Application\Common;

/**
* 自动加载类 
*/
class MyAutoLoad {
    public static function loadprint( $class ) {
    
        $file = BASE_PATH . '\\' . $class . '.class.php';  
        $file = str_replace('\\', "/", $file);  // 转换格式
        // echo $file;
        if (is_file($file)) {   
            require_once($file);  
        } 
    }

    public static function run()
    {   
        $route = new MyRoute();
        $route->goto();
    }
} 
