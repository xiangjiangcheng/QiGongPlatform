<?php
namespace Application\Common;

/**
 *
 *  路由 - 解析请求，控制跳转 
 *  实质上来说就是利用url中的path去匹配对应的控制类
 */
class MyRoute 
{
    public $module = 'Home'; // 模块
    // $func = 'Index'; // 功能
    public $controller = 'Index'; // 控制器名 
    public $action = 'index'; // 方法名
    // $fullUrl = "\\Application\\Home".."Common\\Action\\$action::save";

    /** 
    * 赋值
     */
    public function __construct()
    {   
        // var_dump($_GET);
        if (!empty($_SERVER['REQUEST_URI'])) {
            // 得到传过来的完整路径
            $fullPath = $_SERVER['REQUEST_URI'];
            $getArr = ""; // 存放?形式传递的参数
            
            
            $path = trim($_SERVER['REQUEST_URI'], '?'); // 先移除字符串两侧的字符
            if (strrpos($fullPath, '?')) {
                $path = substr($path, 0, strrpos($path, '?')); // 再去掉？号后面的参数段
            }
            // var_dump($path);die;
            $pathArr = explode('/', $path); 
            
            
            // echo "<pre/>";
            // var_dump($pathArr);
            // var_dump($path);die;
            // 请求controller 
            // 控制 controller 和 action
            try {
                // 得到分组
                if(sizeof($pathArr) > 2){
                    $this->module = $pathArr[2];  
                }
                define('MODULE', $this->module); // 记录模块  - 控制大模块
                define('BASE_CONTROLLER', BASE_PATH . '\Application\\'.$this->module.'\Controller'); //  控制器完整路径
                define('BASE_VIEW', BASE_PATH . '\Application\\'.$this->module.'\View'); // 视图完整路径

                if (sizeof($pathArr) > 3) {
                    $pathArr[3] != '' ? $this->controller=$pathArr[3] : $this->controller='Index';
                    $pathArr[4] != '' ? $this->action=$pathArr[4] : $this->action='index';
                }
            } catch (Exception $e) {
                die ("Error!: " . $e->getMessage() . "<br/>");
            }

            // 判断是get 还是post ---------------改进！
            // if ($_SERVER['REQUEST_METHOD']=="GET") {
            //     // ?limit=10&offset=0&title=&content=&_=1501057090755
            //     // 截取字符串
            //     if (strrpos($fullPath, '?')) {  // get 形式 用？+&传参
            //         $getArr = substr($fullPath, strrpos($fullPath, '?')+1);  // 截取?号后面的参数字符串
            //     }  
            // }

            // if (!empty($getArr)) {
            //     // 解析?+&形式  参数
            //     // echo  $getArr.'fd';die;
            //     $Arr = explode('&', $getArr );
            //     foreach( $Arr as $String ) {
            //         $Ayy = explode('=', $String );
            //         $_GET[ $Ayy[0] ] = $Ayy[1]; 
            //     }    
            //     // echo "<pre/>";
            //     // var_dump( $S['limit'] );die;

            // } else {
            //     // 从/id/1/name/xjiang形式中得到参数
            //     foreach ($pathArr as $k=>$v) {
            //         if ($k > 4 && ($k%2)!=0) {  // 获取键名
            //             // echo $v."<br/>";
            //             $_GET[$v] = $pathArr[$k+1];
            //         }
            //     }
                
            // }

            // 从/id/1/name/xjiang形式中得到参数
            // var_dump($pathArr);
            // echo sizeof($pathArr);die;
            if (sizeof($pathArr) > 6) {
                foreach ($pathArr as $k=>$v) {
                    if ($k > 4 && ($k%2)!=0) {  // 获取键名
                        // echo $v."<br/>";
                        $_GET[$v] = $pathArr[$k+1];
                    }
                }
            }
            
                
            // var_dump($_GET);die;
        }
        
    }

    /**
     * 跳转
     */
    public function goto() 
    {
        // $class = BASE_CONTROLLER ."\\" .$this->controller . ".class.php";
        $class = "Application\\" . MODULE . "\Controller\\$this->controller";
        
        $in_controller = str_replace('\\', "/", BASE_CONTROLLER ."\\" .$this->controller . ".class.php");  // 转换格式
        
        include($in_controller); // 加载controller 
        // die;
        if (!class_exists($class, false)) {
            echo  '没有这个Controller';
            return;
        }
        
        $controller = new $class($this->controller, $this->action);
        $action = $this->action;

        if (!method_exists($controller, $action)) {
            echo  '没有这个action';
            return;
        }

        $controller->$action();
        
    }
}