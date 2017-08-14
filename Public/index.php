<?php
/**
 * 项目的入口文件
 */

// 定义一些常量 
// BASE_PATH 指向项目根目录
// define('BASE_PATH', substr(__DIR__, 0, strrpos(__DIR__, '\\'))); // 指向qigong文件夹 - windows
define('BASE_PATH', substr(__DIR__, 0, strrpos(__DIR__, '/'))); // 指向qigong文件夹 - linux
define('PUBLIC_PATH',__DIR__); // 指向public文件夹 - linux

define('WEBSITE_DOMAIN', 'http://www.qigongplatform.com'); // 网站域名
define('PATH_JS', __DIR__ . '\Js');  // js 路径
define('PATH_BOOTSTRAP', WEBSITE_DOMAIN . '/vendor/twbs/bootstrap/dist');  // js 路径

// 引入自动加载文件
require_once(BASE_PATH . '/Application/Common/MyAutoLoad.class.php');
spl_autoload_register( array('Application\Common\MyAutoLoad','loadprint') );
//另一种写法：spl_autoload_register(  "Application\Common\MyAutoLoad::loadprint"  ); 

// require_once('E:\2017\wnmp\www\QiGongPlatform\Application\Home\Controller\Test\AutoLoadTest.class.php');
// echo "df";

// url控制 - 调用路由  - 判断走哪个控制器
// $obj = new Application\Home\Controller\Test\AutoLoadTest();

// $obj = new Application\Home\Test\Controller\AutoLoadTest();
// $obj->test();
Application\Common\MyAutoLoad::run();
