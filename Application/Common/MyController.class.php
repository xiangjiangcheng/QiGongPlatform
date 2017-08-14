<?php
namespace Application\Common;

/**
 * 公共的controller
 */
class MyController
{
    protected $data;
    protected $controllerName;
    protected $viewName;
    protected $templateDir = BASE_VIEW;

    function __construct($controllerName, $viewName)
    {
        $this->controllerName = $controllerName;
        $this->viewName = $viewName;
    }

    public function __call($action, $args)
    {
        echo $action . "方法不存在";
        return false;
    }

    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function display($file = '')
    {   
        
        if (empty($file)) {
            // 没有传视图名
            $file = strtolower($this->controllerName).'\\'.$this->viewName.'.php';
        } else {
            // 有传视图名
            $file = strtolower($this->controllerName).'\\'.$file.'.php';
        } 
        $path = $this->templateDir.'\\'.$file;
        $path = str_replace('\\',"/",$path);  // 转换格式,'\'全部转换为'/'
        if (!empty($this->data)) {
            extract($this->data);
        }

        // 使用Output Control，取出缓冲区内容。
        ob_start();
        include $path;
        $content = ob_get_clean();

        // 读取出视图中的内容 
        // $handle = fopen($path, 'r');
        // $content = '';
        // while(!feof($handle)){
        //     $content .= fread($handle, 8080);
        // }
        // echo $content;
        // fclose($handle);
        // $a = 'gfgfdg';  // 把视图里面的内容读取到变量中。。。。。。。
        include str_replace('\\',"/",BASE_VIEW.'\include\header.php'); // 引入header
        // echo $path;
        //
        // redirect($path);
        // header('Location: https://www.baidu.com'); 
    }
}
