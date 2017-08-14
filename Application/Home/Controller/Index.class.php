<?php
namespace Application\Home\Controller;

use Application\Common\MyController;

class Index extends MyController
{
    function index() {
        $this->assign('menuid', 0);
        $this->display();
    }
    
}
