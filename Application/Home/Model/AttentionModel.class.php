<?php
namespace Application\Home\Model;

use Application\Common\MyModel;

class AttentionModel extends MyModel{
    public function __construct(){
            parent::__construct();
        //  self::__construct();
    }


    /**
     * 分页
     * 查询
     */
    public function getAll($data) {
        // 得到分页信息
        $limit = $_GET['limit']; // 每页显示条数
        $offset = $_GET['offset']; // 开始查找位置 
        // 得到其他查询条件
        $title = $_GET['title']; // 标题
        $content = $_GET['content']; // 内容


        $strSql = 'SELECT * FROM attention WHERE dlt = 0 LIMIT ' . $offset . ',' . $limit;   // 表名可以处理
        // echo $strSql;die;
        $result['rows'] = $this->db->query($strSql);
        // 获取条数
        $totalSql = 'SELECT * FROM attention WHERE dlt = 0';
        $total = count($this->db->query($totalSql));
        $result['total'] = $total;
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    public function getAttentionById($id) {
        $strSql = 'SELECT * FROM attention WHERE id = ' . $id;   // 表名可以处理
        // $strSql = 'SELECT * FROM Attention';   // 表名可以处理
        $result['rows'] = $this->db->query($strSql);
        // 断开连接
        $this->db->destruct();

        return $result;
    }

    public function updateAttentionById($data) {
        $where = '';  // $where 为空则是insert  不为空则为修改
        if (array_key_exists('id', $data) && !empty($data['id'])) {
            $where = 'id = ' . $data['id'];
        } else {
            $where = '';
        }
        
        $table = 'attention';
        $arrayDataValue['title'] = $data['title'];
        $arrayDataValue['content'] = $data['content'];
        $result['status'] = $this->db->update($table, $arrayDataValue, $where) >=0 ? true : false;
        // 断开连接
        $this->db->destruct();
        
        return $result;
    }

    public function deleteAttentionById($id) {
        $where = 'id in (' . $id . ')';  // 删除条件
        $table = 'attention';  // 表名

        $result['status'] = $this->db->delete($table, $where) >=1 ? true : false;
        // 断开连接
        $this->db->destruct();
        
        return $result;
    }

}
