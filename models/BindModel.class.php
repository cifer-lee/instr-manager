<?php

class BindModel extends Model {
    private $cur_page;
    private $page_size;
    public $filter;

    private $bind_dao;

    public function __construct() {
        $this->cur_page = 0;
        $this->page_size = 20;
        $this->filter = '';

        $this->bind_dao = new BindDao();
    }

    /*
     * 将多个仪器绑到一个学生上
     *
     */
    public function save(array $binds) {
        // 去除由于误操作而导致录入两次相同仪器编号
        $binds['instrIds'] = array_unique($binds['instrIds']);

        $studentId = $binds['stuId'];
        if(! preg_match('/^[0-9]{12}$/', $studentId)) {
            return ;
        }

        foreach($binds['instrIds'] as $instrId) {
            if(preg_match('/^[0-9]{12}$/', $instrId)) {
                $bind = new Bind(null, $studentId, $instrId);
                $this->bind_dao->insert($bind);
            }
        }
    }

    /*
     * 将一个仪器绑到多个学生上
     *
     */
    public function save2(array $binds) {
        // 去除由于误操作而导致录入两次相同仪器编号
        $binds['stuIds'] = array_unique($binds['stuIds']);

        $instrId = $binds['instrId'];
        if(! preg_match('/^[0-9]{12}$/', $instrId)) {
            return ;
        }

        foreach($binds['stuIds'] as $stuId) {
            if(preg_match('/^[0-9]{12}$/', $stuId)) {
                $bind = new Bind(null, $stuId, $instrId);
                $this->bind_dao->insert($bind);
            }
        }
    }

    public function fetch($cond) {
        if(isset($cond)) {
            return $this->bind_dao->find(array('offset' => $this->cur_page * $this->page_size, 'row_count' => $this->page_size, 'filter' => '%' . $this->filter . '%'));
        } else {
            return $this->bind_dao->find_by_instr_id_equal(array('offset' => $this->cur_page * $this->page_size, 'row_count' => $this->page_size, 'filter' => $this->filter));
            //return $this->bind_dao->findAll();
        }
    }

    public function get_num_of_rows() {
        return $this->bind_dao->find_num_of_rows('%' . $this->filter . '%');
    }

    public function get_page_size() {
        return $this->page_size;
    }

    public function get_current_page() {
        return $this->cur_page;
    }

    public function set_current_page($page) {
        $this->cur_page = $page;
    }

    public function set_filter($filter) {
        $this->filter = $filter;
    }

    public function remove($ids) {
        foreach($ids as $v) {
            $bind = new Bind($v, '', '');
            $this->bind_dao->remove($bind);
        }
    }
}

?>
