<?php
namespace RndJson\Frontend\Controllers;

/**
 * Class FakerController
 *
 * @package RndJson\Frontend\Controllers
 */
class FakerController extends ControllerBase
{
    /**
     * Index Action
     */
    public function indexAction()
    {
        $faker = \Faker\Factory::create();

        $response = [
            'name' => $faker->name,
            'age' => $faker->numberBetween(18, 40),
            'address' => $faker->address
        ];
        $this->view->_json = $response;
    }
}
