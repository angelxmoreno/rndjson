<?php
namespace RndJson\Frontend\Entities\Fake;

use Faker\Factory as FakerFactory;

/**
 * Class Fake
 *
 * @package RndJson\Frontend\Entities\Fake
 */
abstract class FakeBase
{
    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * FakeBase constructor
     */
    public function __construct()
    {
        $this->faker = FakerFactory::create();
        $this->assignProperties();
    }

    /**
     * Creates the properties for the Fake Object
     *
     * @return mixed
     */
    abstract protected function assignProperties();
}
