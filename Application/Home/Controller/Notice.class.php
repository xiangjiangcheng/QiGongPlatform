<?php
namespace Application\Home\Controller;

use Application\Common\MyController;
use Application\Home\Model\NoticeModel;

/**
 * 公告控制器
 */
class Notice extends MyController
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
        
    public function addNoticePage()
    {   
        // var_dump($_GET);die;
        // $this->assign('controller', $this->controllerName);
        // $this->assign('action', $this->viewName);
        $this->assign('menuid', $_GET['id']);
        $this->display();
    }

    /**
     * 得到所有的公告数据
     */
    public function getAll() {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        $result = $NoticeModel->getAll($_GET);

        // 返回json
        echo json_encode($result);
    }

    /** 
     * 根据id查询对应的公告数据
     */
    public function getNoticeById() {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        // $result = $NoticeModel->getNoticeById($id);
        // if (!empty($_POST['id'])) {
        //     //
        // }
        $result = array();
        try {
            $result = $NoticeModel->getNoticeById($_POST['id']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id修改数据
     */
    public function updateNoticeById() {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        $result = array();
        try {
            $result = $NoticeModel->updateNoticeById($_POST);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
    /**
     * 根据id删除数据[可以多条删除]
     */
    public function deleteNoticeById() {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        $result = array();
        try {
            $result = $NoticeModel->deleteNoticeById($_POST['idStr']);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        echo json_encode($result);
    }
    
}
