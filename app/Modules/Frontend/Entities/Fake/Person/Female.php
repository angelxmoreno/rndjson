<?php
namespace RndJson\Frontend\Entities\Fake\Person;

/**
 * Class Female
 *
 * @package RndJson\Frontend\Entities\Fake\Person
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
