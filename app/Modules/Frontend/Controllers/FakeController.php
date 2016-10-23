<?php
namespace RndJson\Frontend\Controllers;

use RndJson\Frontend\Entities\Fake\Person as FakePerson;

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
        $person = new FakePerson\Female();
        $this->view->_json = $person->toArray();
    }

    /**
     * Renders a fake male object
     */
    public function maleAction()
    {
        $person = new FakePerson\Male();
        $this->view->_json = $person->toArray();
    }

    /**
     * Render a fake female object
     */
    public function femaleAction()
    {
        $person = new FakePerson\Female();
        $this->view->_json = $person->toArray();
    }
}
