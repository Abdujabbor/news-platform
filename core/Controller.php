<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 7/10/18
 * Time: 3:05 PM
 */

namespace core;

use core\http\Response;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }


    public function render($template, $data = [])
    {
        $controller = strtolower(
            str_replace(CONTROLLER_SUFFIX, "", (new \ReflectionClass($this))->getShortName())
        );
        $this->view->render($controller . DIRECTORY_SEPARATOR . $template, $data);
    }

    public function setEmptyLayout()
    {
        $this->view->setLayout(false);
    }


    public function redirect($url)
    {
        header("Location:" . $url, true, 301);
    }

    public function getParam($name)
    {
        return App::getInstance()->getRequest()->getQueryParams()[$name] ?? null;
    }



}
