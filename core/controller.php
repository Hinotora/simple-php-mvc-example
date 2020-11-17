<?php
/*
    This is main controller class. It will be inherited in other classes.
*/

namespace Core;

class Controller extends Core
{
    protected $model = null;
	protected $view;

    function __construct()
    {
        $this->view = new \Core\View;
    }

    /*
        Method which add models in controller.
    */
    public function addModel($model)
    {
        $model_string = self::models_namespace.$model;

        if(class_exists($model_string))
        {
            $this->model = new $model_string;
        }
        else
        {
            Router::HTTP_ERROR(500, "Can't find model <$model_string> in app/models.
                                    Make sure that .php file and class name has same names");
        }
    }
}