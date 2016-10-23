<?php
namespace RndJson\Frontend\Entities\Faker;

use Faker\Factory as FakerFactory;

/**
 * Class Faker
 *
 * @package RndJson\Frontend\Entities\Faker
 */
abstract class FakerBase
{
    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * FakerBase constructor
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
