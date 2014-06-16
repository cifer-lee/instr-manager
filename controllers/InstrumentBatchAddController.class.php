<?php

class InstrumentBatchAddController extends Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function perform(array $query, array $reqbody) {
        if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_FILES['instrcsv'])) {
            $now_time = date('c');
            $remote_ip = $_SERVER['REMOTE_ADDR'];
            $uploadfile = "upload/{$remote_ip}-{$now_time}";

            if(move_uploaded_file($_FILES['instrcsv']['tmp_name'], $uploadfile)) {
                $handle = fopen($uploadfile, 'r');
                while(($data = fgetcsv($handle)) !== false) {
                    $this->model->save(array('id' => $data[0], 'name' => $data[1]));
                }
            }
        }
    }
}

?>
