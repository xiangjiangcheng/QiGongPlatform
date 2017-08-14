<?php
namespace Application\Admin\Model;
use Application\Common\MyModel;

class NewsModel extends MyModel
{
    public function __construct(){
            parent::__construct();
        //  self::__construct();
    }

    public function getAll() 
    {
        $strSql = 'SELECT * FROM news WHERE dlt = 0';   // 表名可以处理
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    /**
     *  默认查询5条
     * 
     */
    public function getData() 
    {
        // 得到分页信息
        $limit = 5; // 每页显示条数
        $offset = 0; // 开始查找位置 
        $strSql = 'SELECT * FROM news WHERE dlt = 0 LIMIT ' . $offset . ',' . $limit;   // 表名可以处理
        // echo $strSql;die;
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    /**
     * 根据id查询
     */
    public function getNewsById($id) 
    {
        $strSql = 'SELECT * FROM news WHERE id = ' . $id;   // 表名可以处理
        // $strSql = 'SELECT * FROM News';   // 表名可以处理
        $row = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $row;
    }
}
