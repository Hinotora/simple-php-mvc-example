<?php

namespace App\Controllers;

class About extends \Core\Controller
{
    /*
        Created action method for index page in controller about (   /about/   )
    */
    function index()
    {
        // Add model to that controller (models located in app/models)
        $this->addModel('model_about');

        // Get data from model via get_data method
        $data = $this->model->get_data();

        // Here we USE Twig template engine
        $this->view->renderTemplate('about/index.html', $data);
    }

    /*
        Created action method for index page in controller about (   /about/me/   )
    */
    function me()
    {
        // Here we again use php template engine
        $this->view->render('about/index.html');
    }
}