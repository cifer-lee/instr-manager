<?php

class BindAddController extends Controller {
    private $model;
    private $instr_model;

    public function __construct(Model $model) {
        $this->model = $model;
        require 'InstrumentModel.class.php';
        require 'InstrumentDao.class.php';
        require 'Instrument.class.php';
        $this->instr_model = new InstrumentModel();
    }

    public function perform(array $query, array $reqbody) {
        if('POST' == $_SERVER['REQUEST_METHOD']) {
            isset($reqbody['stu-no']) && $stuId = $reqbody['stu-no'];
            if (isset($reqbody['instr-no'])) {
                $instrIds = array();
                $updates = array();
                foreach($reqbody['instr-no'] as $v) {
                    $instrIds[] = $v;
                    $updates[] = array('id' => $v, 'status' => 'used');
                }
            }
            $this->model->save(array('stuId' => $stuId, 'instrIds' => $instrIds));
            $this->instr_model->update($updates);
        }
    }
}

?>
