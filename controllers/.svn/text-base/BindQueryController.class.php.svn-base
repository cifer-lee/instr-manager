<?php

class BindQueryController extends Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function perform(array $query, array $reqbody) {
        /// Cifer: 不需要对 $cond['page'] 做 validation 工作, 这个工作应该在 Model 里进行
        isset($query['page']) && $this->model->set_current_page($query['page']);
        isset($query['filter']) && $this->model->set_filter($query['filter']);
    }
}

?>
