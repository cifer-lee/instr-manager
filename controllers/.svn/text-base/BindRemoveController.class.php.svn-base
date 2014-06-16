<?php

class BindRemoveController extends Controller {
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
        /// Cifer: 不需要对 $cond['page'] 做 validation 工作, 这个工作应该在 Model 里进行
        isset($query['page']) && $this->model->set_current_page($query['page']);
        isset($query['filter']) && $this->model->set_filter($query['filter']);

        if('POST' == $_SERVER['REQUEST_METHOD']) {
            if(isset($reqbody['bindIds'])) {
                $bindIds = $reqbody['bindIds'];
                $this->model->remove($bindIds);

                $stuIds = $reqbody['stuIds'];
                if(isset($reqbody['newInstrId'])) {
                    $new_instr_id = $reqbody['newInstrId'];

                    $updates = array();
                    $updates[] = array('id' => $new_instr_id, 'status' => 'used');
                    $this->instr_model->update($updates);

                    $this->model->save2(array('instrId' => $new_instr_id, 'stuIds' => $stuIds));
                }
            }

            $updates = array();
            $instr_id = $reqbody['instr-id'];
            $status = $reqbody['reason'];
            $updates[] = array('id' => $instr_id, 'status' => $status);
            $this->instr_model->update($updates);

            /*
            $ids = null;
            isset($reqbody['ids']) && $ids = $reqbody['ids'];
            $this->model->remove($ids);
             */
        }
    }
}

?>
