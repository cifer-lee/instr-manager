<?php

class InstrumentDao {
    private $db;
    private $stmt_insert;
    private $stmt_update_status;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->stmt_insert = $this->db->prepare('insert into instrument (id, name, status) values (?, ?, ?)');
        $this->stmt_update_status = $this->db->prepare('update instrument set status=? where id=?');

        if(! $this->stmt_insert) {
            throw new Exception('Prepare Statement Failed. ' . get_class());
        }
    }

    public function __destruct() {
        $this->stmt_insert->close();
        $this->db->close();
        $this->stmt_insert = null;
        $this->db = null;
    }

    public function findAll() {
        $rows = array();
        if($result = $this->db->query('select id, name from instrument')) {
            while($row = $result->fetch_row()) {
                $rows[] = array('id' => $row[0], 'name' => $row[1]);
            }

            $result->close();
        } else {
        }

        return $rows;
    }

    public function find($cond) {
        $rows = array();
        $sql = 'select id, name, status from instrument ';
        $sql .= 'where id like \'' . $cond['filter'] . '\' ';
        $sql .= 'limit ' . $cond['offset'] . ', ' . $cond['row_count'];
        if($result = $this->db->query($sql)) {
            while($row = $result->fetch_row()) {
                $rows[] = array('id' => $row[0], 'name' => $row[1], 'status' => $row[2]);
            }

            $result->close();
        } else {
        }

        return $rows;
    }

    public function findById($id) {
    }

    public function find_num_of_rows($filter) {
        $num_of_rows = 0;
        $sql = 'select count(id) from instrument ';
        $sql .= 'where id like \'' . $filter . '\' ';
        if($result = $this->db->query($sql)) {
            $row = $result->fetch_row();
            $num_of_rows = $row[0];

            $result->close();
        }

        return $num_of_rows;
    }

    public function insert(Instrument $instrument) {
        $this->stmt_insert->bind_param('sss', $instrument->id, $instrument->name, $instrument->status);
        $this->stmt_insert->execute();
    }

    public function update_status(Instrument $instrument) {
        $this->stmt_update_status->bind_param('ss', $instrument->status, $instrument->id);
        $this->stmt_update_status->execute();

    }

    public function remove(Instrument $instrument) {
        $sql = "delete from instrument where id='{$instrument->id}'";
        if(! $this->db->query($sql)) {
            print_r("删除 {$instrument->id} 失败.");
        }
    }
}

?>
