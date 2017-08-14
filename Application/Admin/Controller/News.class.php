<?php
namespace Application\Admin\Controller;

use Application\Common\MyController;
use Application\Admin\Model\NewsModel;

/**
 * 资讯控制器
 * 
 */
class News extends MyController
{

    public function showListPage()
    {   
        // var_dump($_GET);die;
        $this->assign('controller', $this->controllerName);
        $this->assign('action', $this->viewName);
        // $this->display('testview');
        $this->display();
    }
    
    public function newsDetailPage()
    {   
        // 得到详细数据
        $id = $_GET['id'];
        $row = $this->getNewsById($id);
        // var_dump($row[0]);die;
        // 查出来的数据放入视图
        $this->assign('row', $row[0]);
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
     * 得到前5条数据
     */
    public function getData() {
        // 调用model层方法
        $NewsModel = new NewsModel();
        $result = $NewsModel->getData();
        echo json_encode($result);
    }
    
    /**
     * 根据id查询对应的资讯数据
     */
    public function getNewsById($id) {
        // 调用model层方法
        $NewsModel = new NewsModel();
        $result = array();
        try {
            $result = $NewsModel->getNewsById($id);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        return $result;
    }

}
