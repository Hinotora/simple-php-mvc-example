<?php
/*
    This is an abstract class, which inherited by other classes.
*/
namespace Core;

abstract class Core
{
    /*
        Define namespaces to fast access to class files.
    */
    protected const controllers_namespace = '\App\Controllers\\';
    protected const models_namespace = '\App\Models\\';
    protected const views_namespace = '\App\Views\\';
}
