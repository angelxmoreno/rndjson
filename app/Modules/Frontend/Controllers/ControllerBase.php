<?php
namespace RndJson\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\ResponseInterface;

/**
 * Class ControllerBase
 *
 * @package RndJson\Frontend\Controllers
 */
abstract class ControllerBase extends Controller
{
    /**
     * @param Dispatcher $dispatcher
     *
     * @return ResponseInterface
     */
    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
        if (!is_null($this->view->_json)) {
            $this->useJsonResponse();
        }
        return $this->response->send();
    }

    /**
     * Sets the view to s JSON response using the View->_json value
     */
    protected function useJsonResponse()
    {
        $this->view->disableLevel(array(
            View::LEVEL_ACTION_VIEW => true,
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true,
            View::LEVEL_AFTER_TEMPLATE => true,
            View::LEVEL_BEFORE_TEMPLATE => true
        ));

        $data = json_encode($this->view->_json);
        $this->response->setContent($data);
    }
}
