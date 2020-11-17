<?php
/*
    Main rounting class, activates controllers and actions.
*/

namespace Core;

class Router extends \Core\Core
{
    protected $url;

    protected $controller = 'Home';
    protected $action = 'index';

    function __construct()
    {
        $this->url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /*
        This method requires controllers and starts actions depending on url.
    */
    public function run()
    {
        $routes = explode('/', $this->url);

        if(!empty($routes[1])) $this->controller = $routes[1];
        if(!empty($routes[2])) $this->action = $routes[2];

        $request_controller = self::controllers_namespace.$this->controller;

        $request_action = $this->action;

        if(class_exists($request_controller))
        {
            $controller_object = new $request_controller;

            if(method_exists($controller_object, $request_action))
            {
                $controller_object->$request_action();
            }
            else
            {
                Router::HTTP_ERROR(404, "Can't find method <$request_action> in
                                        <$request_controller> class. Make sure that you created it or re-check name.");
            }
        }
        else
        {
            Router::HTTP_ERROR(404, "Can't find class <$request_controller>.
                                    Make sure that .php file and folder has same name.");
        }
    }

    /*
        This method stops running if controllers or actions can't be reached by router.
    */
    public static function HTTP_ERROR($http_code, $text = '')
    {
        $err_text = "<h2 style='text-align: center'>ERROR</h2>
                    <p>Server responded with code: $http_code.</p><br><p>Error message: $text</p>";

        $config = require APP_PATH.'config.php';

        http_response_code($http_code);

        if($config['DEBUG_MODE'])
            die($err_text);
        else
            die();
    }
}
