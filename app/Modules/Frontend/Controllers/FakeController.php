<?php
namespace RndJson\Frontend\Controllers;

use RndJson\Frontend\Entities\Fake;

/**
 * Class FakeController
 *
 * @package RndJson\Frontend\Controllers
 */
class FakeController extends ControllerBase
{
    /**
     * Index Action
     */
    public function indexAction()
    {
        $fakeObj = new Fake\Person\Female();
        $this->view->_json = $fakeObj->toArray();
    }

    /**
     * Renders a fake person object
     */
    public function personAction()
    {
        $gender = Fake\Person\Female::decide([
            'male' => .40,
            'female' => .50
        ]);

        $action = "{$gender}Action";
        $this->$action();
    }

    /**
     * Renders a fake male object
     */
    public function maleAction()
    {
        $fakeObj = new Fake\Person\Male();
        $this->view->_json = $fakeObj->toArray();
    }

    /**
     * Render a fake female object
     */
    public function femaleAction()
    {
        $fakeObj = new Fake\Person\Female();
        $this->view->_json = $fakeObj->toArray();
    }

    /**
     * Render a fake address object
     */
    public function addressAction()
    {
        $fakeObj = new Fake\Address();
        $this->view->_json = $fakeObj->toArray();
    }
}
