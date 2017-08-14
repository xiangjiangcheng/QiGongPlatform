<?php
namespace Application\Home\Model;

use Application\Common\MyModel;

class NewsModel extends MyModel{
    public function __construct(){
            parent::__construct();
        //  self::__construct();
    }

    public function getAll() {
        $strSql = 'SELECT * FROM news WHERE dlt = 0';   // 表名可以处理
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    public function getNewsById($id) {
        $strSql = 'SELECT * FROM news WHERE id = ' . $id;   // 表名可以处理
        // $strSql = 'SELECT * FROM News';   // 表名可以处理
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    public function updateNewsById($data) {
        $where = '';  // $where 为空则是insert  不为空则为修改
        if (array_key_exists('id', $data) && !empty($data['id'])) {
            $where = 'id = ' . $data['id'];
        } else {
            $where = '';
        }
        
        $table = 'news';
        $arrayDataValue['title'] = $data['title'];
        $arrayDataValue['content'] = $data['content'];
        $arrayDataValue['intro'] = $data['intro'];

        if ($data['picture_cover']) {
            $arrayDataValue['picture_cover'] = $data['picture_cover'];
        }
        // $arrayDataValue['video'] = $data['video'];	
        $result['status'] = $this->db->update($table, $arrayDataValue, $where) >=0 ? true : false;
        // 断开连接
        $this->db->destruct();
        
        return $result;
    }

    public function deleteNewsById($id) {
        $where = 'id = ' . $id;  // 删除条件
        $table = 'news';  // 表名

        $result['status'] = $this->db->delete($table, $where) >=1 ? true : false;
        // 断开连接
        $this->db->destruct();
        
        return $result;
    }

}
