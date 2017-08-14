<?php
namespace Application\Admin\Model;

use Application\Common\MyModel;

class AttentionModel extends MyModel
{
    public function __construct()
    {
            parent::__construct();
        //  self::__construct();
    }

    /**
     * 查询所有
     */
    public function getAll() 
    {
        $strSql = 'SELECT * FROM attention WHERE dlt = 0';   // 表名可以处理
        // echo $strSql;die;
        // $result['rows'] = $this->db->query($strSql);
        $rows = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $rows;
    }

    public function getAttentionById($id) 
    {
        $strSql = 'SELECT * FROM attention WHERE id = ' . $id;   // 表名可以处理
        // $strSql = 'SELECT * FROM Attention';   // 表名可以处理
        $row = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $row;
    }

}
