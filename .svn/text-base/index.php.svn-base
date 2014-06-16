<?php 

ini_set('include_path', './controllers:./models:./views:./templates:./entities:./dao');
require_once 'Database.class.php';
require_once 'Controller.class.php';
require_once 'View.class.php';
require_once 'Model.class.php';

$actions = array(
    'instrIndex' => array('model' => 'InstrumentModel', 'view' => 'InstrumentIndexView', 'controller' => 'InstrumentIndexController', 'dao' => 'InstrumentDao', 'entity' => 'Instrument'),
    'instrQuery' => array('model' => 'InstrumentModel', 'view' => 'InstrumentQueryView', 'controller' => 'InstrumentQueryController', 'dao' => 'InstrumentDao', 'entity' => 'Instrument'),
    'instrAdd' => array('model' => 'InstrumentModel', 'view' => 'InstrumentAddView', 'controller' => 'InstrumentAddController', 'dao' => 'InstrumentDao', 'entity' => 'Instrument'),
    'instrBatchAdd' => array('model' => 'InstrumentModel', 'view' => 'InstrumentAddView', 'controller' => 'InstrumentBatchAddController', 'dao' => 'InstrumentDao', 'entity' => 'Instrument'),
    'instrRemove' => array('model' => 'InstrumentModel', 'view' => 'InstrumentQueryView', 'controller' => 'InstrumentRemoveController', 'dao' => 'InstrumentDao', 'entity' => 'Instrument'),
    'bindIndex' => array('model' => 'BindModel', 'view' => 'BindIndexView', 'controller' => 'BindIndexController', 'dao' => 'BindDao', 'entity' => 'Bind'),
    'bindQuery' => array('model' => 'BindModel', 'view' => 'BindQueryView', 'controller' => 'BindQueryController', 'dao' => 'BindDao', 'entity' => 'Bind'),
    'bindQueryAjax' => array('model' => 'BindModel', 'view' => 'BindQueryAjaxView', 'controller' => 'BindQueryController', 'dao' => 'BindDao', 'entity' => 'Bind'),
    'bindAdd' => array('model' => 'BindModel', 'view' => 'BindAddView', 'controller' => 'BindAddController', 'dao' => 'BindDao', 'entity' => 'Bind'),
    'bindRemove' => array('model' => 'BindModel', 'view' => 'BindRemoveView', 'controller' => 'BindRemoveController', 'dao' => 'BindDao', 'entity' => 'Bind')
);

if (isset($actions[$_GET['action']])) {
    $model_name = $actions[$_GET['action']]['model'];
    $view_name = $actions[$_GET['action']]['view'];
    $controller_name = $actions[$_GET['action']]['controller'];

    $entity_name = $actions[$_GET['action']]['entity'];
    $dao_name = $actions[$_GET['action']]['dao'];

    require $model_name . '.class.php';
    require $view_name . '.class.php';
    require $controller_name . '.class.php';

    require $entity_name . '.class.php';
    require $dao_name . '.class.php';

    $model = new $model_name();
    $controller = new $controller_name($model);
    $view = new $view_name($controller, $model);

    $controller->perform($_GET, $_POST);
} else {
    require 'IndexModel.class.php';
    require 'IndexView.class.php';
    require 'IndexController.class.php';

    $model = new IndexModel();
    $controller = new IndexController($model);
    $view = new IndexView($controller, $model);
}

header('Content-Type: text/html; charset=utf8');
echo $view->output();

?>
