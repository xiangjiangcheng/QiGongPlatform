<?php
namespace Application\Home\Controller;

use Application\Common\MyController;
use Application\Home\Model\UserWinModel;

/**
 * 用户中奖控制器
 */
class UserWin extends MyController
{

    public function showListPage()
    {   
        // var_dump($_GET);die;
        $this->assign('menuid', $_GET['id']);
        $this->assign('controller', $this->controllerName);
        $this->assign('action', $this->viewName);
        $this->display();
    }
        
    public function addUserWinPage()
    {   
        
        $this->assign('menuid', $_GET['id']);
        $this->display();
    }

    /**
     * 得到所有的公告数据
     */
    public function getAll() {
        // 调用model层方法
        $UserWinModel = new UserWinModel();
        $result = $UserWinModel->getAll($_GET);

        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id查询对应的公告数据
     */
    public function getUserWinById() {
        // 调用model层方法
        $UserWinModel = new UserWinModel();
        // $result = $UserWinModel->getUserWinById($id);
        // if (!empty($_POST['id'])) {
        //     //
        // }
        $result = array();
        try {
            $result = $UserWinModel->getUserWinById($_POST['id']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }

    /** 
     * 根据id修改数据
     */
    public function updateUserWinById() {
        // 调用model层方法
        $UserWinModel = new UserWinModel();
        $result = array();
        try {
            $result = $UserWinModel->updateUserWinById($_POST);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
    /**
     * 根据id删除数据[可以多条删除]
     */
    public function deleteUserWinById() {
        // 调用model层方法
        $UserWinModel = new UserWinModel();
        $result = array();
        try {
            $result = $UserWinModel->deleteUserWinById($_POST['idStr']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
}
