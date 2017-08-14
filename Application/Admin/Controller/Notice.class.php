<?php
namespace Application\Admin\Controller;

use Application\Common\MyController;
use Application\Admin\Model\NoticeModel;
/**
 * 公告控制器
 */
class Notice extends MyController
{

    public function showListPage()
    {   
        $this->display();
    }
        
    public function noticeDetailPage()
    {   
        // 得到详细数据
        $id = $_GET['id'];
        $row = $this->getNoticeById($id);
        // var_dump($row[0]);die;
        // 查出来的数据放入视图
        $this->assign('row', $row[0]);
        $this->display();
    }

    /**
     * 得到所有的公告数据
     */
    public function getAll() 
    {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        $result = $NoticeModel->getAll();

        // 返回json
        echo json_encode($result);
    }

    /**
     * 根据id查询对应的公告数据
     */
    public function getNoticeById($id) 
    {
        // 调用model层方法
        $NoticeModel = new NoticeModel();
        $result = array();
        try {
            $result = $NoticeModel->getNoticeById($id);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        // 返回json
        return $result;
    }
}
