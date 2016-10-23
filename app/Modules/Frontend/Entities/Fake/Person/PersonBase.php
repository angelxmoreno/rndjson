<?php
namespace RndJson\Frontend\Entities\Fake\Person;

use RndJson\Frontend\Entities\Fake\FakeBase;

/**
 * Class Person
 *
 * @package RndJson\Frontend\Entities\Fake\Person
 */
abstract class PersonBase extends FakeBase
{
    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $suffix;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var \DateTime
     */
    protected $dob;

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        $interval = $this->getDob()->diff(new \DateTime());
        return (int)$interval->format('%y');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return implode(' ', [
            $this->getTitle(),
            $this->getFirstName(),
            $this->getLastName(),
            $this->getSuffix(),
        ]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'suffix' => $this->getSuffix(),
            'name' => $this->getName(),
            'gender' => $this->getGender(),
            'age' => $this->getAge(),
            'dob' => $this->getDob()->format('Y-m-d H:i:s')
        ];
    }

    /**
     * @inheritdoc
     */
    protected function assignProperties()
    {
        $this->title = $this->faker->title($this->gender);
        $this->first_name = $this->faker->firstName($this->gender);
        $this->last_name = $this->faker->lastName;
        $this->suffix = $this->faker->suffix();
        $this->dob = $this->faker->dateTimeBetween('-65 years', '-18 years');
    }
}
