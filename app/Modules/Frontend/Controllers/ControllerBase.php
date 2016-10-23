<?php
namespace RndJson\Frontend\Controllers;

use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;

/**
 * Class ControllerBase
 *
 * @package RndJson\Frontend\Controllers
 */
abstract class ControllerBase extends Controller
{

    /**
     * Initializes the controllers
     *
     * Is executed first, before any action is executed on a controller.
     * The use of the __construct() method is not recommended.
     *
     */
    public function initialize()
    {
    }

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
