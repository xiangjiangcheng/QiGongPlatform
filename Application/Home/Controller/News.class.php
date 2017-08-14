<?php
namespace Application\Home\Controller;

use Application\Common\MyController;
use Application\Home\Model\NewsModel;

/**
 *
 * 资讯控制器
 */
class News extends MyController
{

    public function showListPage()
    {   
        // var_dump($_GET);die;
        $this->assign('menuid', $_GET['id']);
        $this->assign('controller', $this->controllerName);
        $this->assign('action', $this->viewName);
        // $this->display('testview');
        $this->display();
    }
        
    public function addNewsPage()
    {  
        $this->assign('menuid', $_GET['id']); 
        $this->display();
    }

    /**
     * 得到所有的资讯数据
     */
    public function getAll() {
        // 调用model层方法
        $NewsModel = new NewsModel();
        $result = $NewsModel->getAll();

        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id查询对应的资讯数据
     */
    public function getNewsById() {
        // 调用model层方法
        $NewsModel = new NewsModel();
        // $result = $NewsModel->getNewsById($id);
        // if (!empty($_POST['id'])) {
        //     //
        // }
        $result = array();
        try {
            $result = $NewsModel->getNewsById($_POST['id']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id修改数据
     */
    public function updateNewsById() {
        $file = 'picture_cover'; // 页面文件name属性
    
        $flag = \Application\Common\Utils\Upload_File::todo($file); // 成功返回文件名，失败返回false
        // 调用model层方法
        $NewsModel = new NewsModel();
        $result = array();
        try {
            $_POST['picture_cover'] = $flag;
            $result = $NewsModel->updateNewsById($_POST);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
            
        
    }
    
    /**
     * 根据id删除数据
     */
    public function deleteNewsById() {
        // 调用model层方法
        $NewsModel = new NewsModel();
        $result = array();
        try {
            $result = $NewsModel->deleteNewsById($_POST['id']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
}
