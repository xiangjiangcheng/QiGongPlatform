<?php
namespace Application\Admin\Controller;

use Application\Common\MyController;
use Application\Admin\Model\AttentionModel;

/**
 * 参赛须知控制器
 * 
 */
class Attention extends MyController
{
    /**
     * 显示参赛须知列表
     */
    public function showListPage()
    {  
        $rows = $this->getAll();
        // 查出来的数据放入视图
        $this->assign('rows', $rows);
        $this->display();
    }
        
    /**
     * 参赛须知详情页
     */
    public function attentionDetailPage()
    {   
        // 得到详细数据
        $id = $_GET['id'];
        $row = $this->getAttentionById($id);
        // 查出来的数据放入视图
        $this->assign('row', $row[0]);   
        $this->display();
    }

    /**
     * 得到所有的参赛须知数据
     */
    public function getAll()
    {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
        return $AttentionModel->getAll();
    }

    /**
     * 根据id查询对应的公告数据
     */
    public function getAttentionById($id)
    {
        // 调用model层方法
        $AttentionModel = new AttentionModel();
            
        $result = array();
        try {
            $result = $AttentionModel->getAttentionById($id);
        } catch (Exception $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        return $result;
    }

    
}
