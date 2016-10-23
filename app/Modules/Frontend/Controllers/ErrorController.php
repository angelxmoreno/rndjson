<?php
namespace RndJson\Frontend\Controllers;

/**
 * Class IndexController
 *
 * @package RndJson\Frontend\Controllers
 */
class ErrorController extends ControllerBase
{
    public function indexAction($status = 500)
    {
        $msg = 'An error has happend';
        $this->view->_json = [
            'status' => $status,
            'message' => $msg
        ];
    }

    public function route404Action()
    {
        $msg = 'That Page was not found';
        $this->view->_json = [
            'status' => '404',
            'message' => $msg
        ];
    }
}
