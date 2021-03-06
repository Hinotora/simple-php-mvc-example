<?php

namespace App\Models;

class model_about extends \Core\Model
{
    /*
        This method returns data from model. Here it returns array with page info.
        We will use it in template render engine.
    */
    function get_data()
    {
        return array('page_name'=>'About page', 'page_text'=> 'This text generated by model and uses Twig');
    }

    /*
        You can create your own model methods and use it in controllers.
    */
}