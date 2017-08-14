<?php
namespace Application\Home\Controller;

use Application\Common\MyController;
use Application\Home\Model\AttentionModel;

/**
 * 参赛须知控制器
 */
class Attention extends MyController
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
        
    public function addAttentionPage()
    {   
        $this->assign('menuid', $_GET['id']);
        $this->display();
    }

    public function getAll() {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
        $result = $AttentionModel->getAll($_GET);

        // 返回json
        echo json_encode($result);
    }

    public function getAttentionById() {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
        // $result = $AttentionModel->getAttentionById($id);
        // if (!empty($_POST['id'])) {
        //     //
        // }
        $result = array();
        try {
            $result = $AttentionModel->getAttentionById($_POST['id']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id修改数据
     */
    public function updateAttentionById() {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
        $result = array();
        try {
            $result = $AttentionModel->updateAttentionById($_POST);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
    /**
     * 根据id删除数据[可以多条删除]
     */
    public function deleteAttentionById() {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
        $result = array();
        try {
            $result = $AttentionModel->deleteAttentionById($_POST['idStr']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
}
