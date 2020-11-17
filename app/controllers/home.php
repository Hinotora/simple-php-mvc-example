<?php

namespace App\Controllers;

class Home extends \Core\Controller
{
    /*
        Created action method for index page in controller about (   /   )
    */
    function index()
    {
        // We don't use model. Creating a simple array
        $data = array('page_text'=>'This page uses php template engine');

        // Here we don't use Twig
        $this->view->render('home/index.html', $data);
    }

    /*
        Index page don't support other actions.
        But you can create controllers to make other pages.
    */
}