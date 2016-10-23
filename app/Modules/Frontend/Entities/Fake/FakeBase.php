<?php
namespace RndJson\Frontend\Entities\Fake;

use Faker\Factory as FakerFactory;
use function \nspl\rnd\weightedChoice;
use function \nspl\a\pairs;

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
     * Helper method for making decisions based off of choices
     *
     * @param array $choices
     *
     * @return string
     */
    public static function decide(array $choices)
    {
        return weightedChoice(pairs($choices));
    }

    /**
     * Converts the object into an Array
     *
     * @return array
     */
    abstract public function toArray();

    /**
     * Creates the properties for the Fake Object
     *
     * @return mixed
     */
    abstract protected function assignProperties();
}
