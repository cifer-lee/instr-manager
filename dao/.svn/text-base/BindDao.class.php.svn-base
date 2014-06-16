<?php

class BindDao {
    private $db;
    private $stmt_insert;
    private $stmt_select;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->stmt_insert = $this->db->prepare('insert into bind (student_id, instr_id) values (?, ?)');
        $this->stmt_select = $this->db->prepare('select id, student_id, instr_id from bind');

        if(! $this->stmt_insert || ! $this->stmt_select) {
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
        $sql = 'select b.id, b.student_id, b.instr_id, i.name instr_name, s.name student_name, c.name class_name from bind b ';
        $sql .= 'left join student s on b.student_id=s.id ';
        $sql .= 'left join class c on s.class_id=c.id ';
        $sql .= 'left join instrument i on b.instr_id=i.id';

        if($result = $this->db->query($sql)) {
            while($row = $result->fetch_row()) {
                $rows[] = array(
                    'id' => $row[0], 
                    'student_id' => $row[1], 
                    'instr_id' => $row[2], 
                    'instr_name' => $row[3],
                    'student_name' => $row[4], 
                    'class_name' => $row[5]
                );
            }

            $result->close();
        } else {
        }

        return $rows;
    }

    public function find($cond) {
        $rows = array();
        $sql = 'select b.id, b.student_id, b.instr_id, i.name instr_name, s.name student_name, c.name class_name from bind b ';
        $sql .= 'left join student s on b.student_id=s.id ';
        $sql .= 'left join class c on s.class_id=c.id ';
        $sql .= 'left join instrument i on b.instr_id=i.id ';
        $sql .= 'where b.student_id like \'' . $cond['filter'] . '\' OR b.instr_id like \'' . $cond['filter'] . '\'';
        $sql .= ' limit ' . $cond['offset'] . ', ' . $cond['row_count'];

        if($result = $this->db->query($sql)) {
            while($row = $result->fetch_row()) {
                $rows[] = array(
                    'id' => $row[0], 
                    'student_id' => $row[1], 
                    'instr_id' => $row[2], 
                    'instr_name' => $row[3],
                    'student_name' => $row[4], 
                    'class_name' => $row[5]
                );
            }

            $result->close();
        } else {
        }

        return $rows;
    }

    public function find_by_instr_id_equal($cond) {
        $rows = array();
        $sql = 'select b.id, b.student_id, b.instr_id, i.name instr_name, s.name student_name, c.name class_name from bind b ';
        $sql .= 'left join student s on b.student_id=s.id ';
        $sql .= 'left join class c on s.class_id=c.id ';
        $sql .= 'left join instrument i on b.instr_id=i.id ';
        $sql .= 'where b.instr_id=\'' . $cond['filter'] . '\'';
        $sql .= ' limit ' . $cond['offset'] . ', ' . $cond['row_count'];

        if($result = $this->db->query($sql)) {
            while($row = $result->fetch_row()) {
                $rows[] = array(
                    'id' => $row[0], 
                    'student_id' => $row[1], 
                    'instr_id' => $row[2], 
                    'instr_name' => $row[3],
                    'student_name' => $row[4], 
                    'class_name' => $row[5]
                );
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
        $sql = 'select count(id) from bind ';
        $sql .= 'where student_id like \'' . $filter . '\' OR instr_id like \'' . $filter . '\'';
        if($result = $this->db->query($sql)) {
            $row = $result->fetch_row();
            $num_of_rows = $row[0];

            $result->close();
        }

        return $num_of_rows;
    }

    public function insert(Bind $bind) {
        $this->stmt_insert->bind_param('ss', $bind->student_id, $bind->instr_id);
        $this->stmt_insert->execute();
    }

    public function update(Bind $bind) {
    }

    public function remove(Bind $bind) {
        $sql = "delete from bind where id='{$bind->id}'";
        if(! $this->db->query($sql)) {
            print_r("删除 {$bind->id} 失败.");
        }
    }
}

?>
