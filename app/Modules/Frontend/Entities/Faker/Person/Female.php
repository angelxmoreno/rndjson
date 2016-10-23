<?php
namespace RndJson\Frontend\Entities\Faker\Person;

/**
 * Class Female
 *
 * @package RndJson\Frontend\Entities\Faker\Person
 */
class Female extends PersonBase
{
    protected $gender = 'female';
    protected $bad_suffixes = [
        'Sr.',
        'Jr.',
        'I',
        'II',
        'III',
        'IV',
        'V'
    ];

    protected function assignProperties()
    {
        parent::assignProperties();
        while (in_array($this->getSuffix(), $this->bad_suffixes)) {
            $this->suffix = $this->faker->suffix;
        }
    }
}
