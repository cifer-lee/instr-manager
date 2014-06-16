<?php

class InstrumentModel extends Model {
    private $cur_page;
    private $page_size; 
    private $instr_dao;
    public $filter;

    public function __construct() {
        $this->cur_page = 0;
        $this->page_size = 20;
        $this->filter = '';

        $this->instr_dao = new InstrumentDao();
    }

    public function save(array $instr) {
        // TODO: 

        $instrId = $instr['id'];
        if(! preg_match('/^[0-9]{12}$/', $instrId)) {
            return ;
        }
        $instrName = $instr['name'];
        $instrStatus = 'unused';
        $instr = new Instrument($instrId, $instrName, $instrStatus); 

        $this->instr_dao->insert($instr);
    }

    public function fetch($cond) {
        if(isset($cond)) {
            return $this->instr_dao->find(array('offset' => $this->cur_page * $this->page_size, 'row_count' => $this->page_size, 'filter' => '%' . $this->filter . '%'));
        } else {
            return $this->instr_dao->findAll();
        }
    }

    public function get_num_of_rows() {
        return $this->instr_dao->find_num_of_rows('%' . $this->filter . '%');
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

    public function update($updates) {
        foreach($updates as $v) {
            $instr = new Instrument($v['id'], '', $v['status']);
            $this->instr_dao->update_status($instr);
        }
    }

    public function remove($ids) {
        foreach($ids as $v) {
            $instr = new Instrument($v, '');
            $this->instr_dao->remove($instr);
        }
    }
}

?>
