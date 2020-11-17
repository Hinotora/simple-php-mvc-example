<?php
/*
    Main view class file, which will be inherited by sub-view classes.
*/

namespace Core;

class View extends Core
{
    /*
        This method don't use other Twig template engine.
    */
    public function render($path, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = BASE_PATH."/App/Views/".$path;

        if(is_readable($file))
        {
            require $file;
        }
        else
        {
            Router::HTTP_ERROR(500, "Can't find template file <$file>.");
        }
    }

    /*
        This method uses Twig and requires it to be installed by composer.
    */
    public function renderTemplate($path, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            if(!class_exists('\Twig\Loader\Filesystemloader'))
            {
                Router::HTTP_ERROR(500, "Unable to initialize Twig template engine.
                                        Are you updated dependencies? -> Use composer update.
                                        Or you can use standart render which includes php variables.
                                        -> change renderTemplate() to render()");
            }

            $loader = new \Twig\Loader\Filesystemloader(dirname(__DIR__) . '/app/views');
            $twig = new \Twig\Environment($loader);
        }

        echo $twig->render($path, $args);
    }
}
