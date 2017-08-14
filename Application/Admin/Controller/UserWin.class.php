<?php
namespace Application\Admin\Controller;

use Application\Common\MyController;
use Application\Admin\Model\UserWinModel;

/**
 * 用户中奖控制器
 */
class UserWin extends MyController
{

    public function showListPage()
    {   
        // var_dump($_GET);die;
        $this->assign('controller', $this->controllerName);
        $this->assign('action', $this->viewName);
        // $this->display('testview');
        $this->display();
    }
        
    public function addUserWinPage()
    {   
        // var_dump($_GET);die;
        // $this->assign('controller', $this->controllerName);
        // $this->assign('action', $this->viewName);
        $this->display();
    }

    /**
     * 获取所有数据
     */
    public function getAll() 
    {
        // 调用model层方法
        $UserWinModel = new UserWinModel();
        $result = $UserWinModel->getAll($_GET);

        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id查询对应的用户中奖信息
     */
    public function getUserWinById() 
    {
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
     * 根据id修改对应的用户中奖信息
     */
    public function updateUserWinById() 
    {
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
     * 根据id修改对应的用户中奖信息[可以多条删除]
     */
    public function deleteUserWinById() 
    {
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
