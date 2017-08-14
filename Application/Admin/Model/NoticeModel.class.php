<?php
namespace Application\Admin\Model;
use Application\Common\MyModel;

class NoticeModel extends MyModel
{
    public function __construct()
    {
            parent::__construct();
        //  self::__construct();
    }

    /**
     * 查询
     */
    public function getAll() 
    {
        $strSql = 'SELECT * FROM notice WHERE dlt = 0';   // 表名可以处理
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    public function getNoticeById($id) 
    {
        $strSql = 'SELECT * FROM notice WHERE id = ' . $id;   // 表名可以处理
        // $strSql = 'SELECT * FROM notice';   // 表名可以处理
        $row = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $row;
    }
}
