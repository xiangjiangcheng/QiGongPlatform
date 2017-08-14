<?php
namespace Application\Common;

use Application\Common\Utils\MyPDO;

/**
 * 公共的model
 */
class MyModel {
    protected $DB_TYPE; //数据库类型
    protected $DB_USER; //用户名 
    protected $DB_PWD; //密码
    protected $DB_HOST; //ip
    protected $DB_NAME; //数据库名
    protected $DB_CHARSET; //字符
    protected $db;

    public function __construct(){
        // $CFG = include BASE_PATH . '\Application\Common\Conf\Config.class.php';
        
        $_CFG = include_once str_replace('\\', "/", BASE_PATH . '\Application\Common\Conf\Config.class.php');;
        // var_dump($_CFG);
        $this->DB_HOST = $_CFG['DB_HOST'];
        $this->DB_USER = $_CFG['DB_USER'];
        $this->DB_PWD = $_CFG['DB_PWD'];
        $this->DB_NAME = $_CFG['DB_NAME'];
        $this->DB_CHARSET = $_CFG['DB_CHARSET'];

        $this->db = MyPDO::getInstance($this->DB_HOST, $this->DB_USER, $this->DB_PWD, $this->DB_NAME, $this->DB_CHARSET); // 从配置文件读取
    }

}
