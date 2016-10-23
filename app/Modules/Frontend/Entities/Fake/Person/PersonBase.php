<?php
namespace RndJson\Frontend\Entities\Fake\Person;

use Cake\Utility\Inflector;
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
     * @var string
     */
    protected $email_address;

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
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
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
            'dob' => $this->getDob()->format('Y-m-d H:i:s'),
            'email_address' => $this->getEmailAddress()
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

        $has_email = static::decide([
            0 => .15,
            1 => .85
        ]);

        if ($has_email) {
            $this->email_address = $this->buildEmailAddress();
        } else {
            $this->email_address = null;
        }

    }

    /**
     * Build an email
     *
     * @TODO move to trait
     *
     * @return string
     */
    protected function buildEmailAddress()
    {
        $email_parts = [];
        $email = '';

        //use full name ?
        if (rand(0, 1)) {
            $email_parts[] = $this->getFirstName();
            $email_parts[] = $this->getLastName();
        } else {
            //use first name ?
            if (rand(0, 1)) {
                $email_parts[] = $this->getFirstName();
            }

            //use rand wrd ?
            if (rand(0, 1)) {
                $email_parts[] = $this->faker->domainWord;
            }

            //use last name ?
            if (rand(0, 1)) {
                $email_parts[] = $this->getLastName();
            }

            //use rand wrd ?
            if (rand(0, 1)) {
                $email_parts[] = $this->faker->domainWord;
            }
        }

        //sanity check
        if (count($email_parts) === 0) {
            $email_parts[] = $this->faker->colorName;
            $email_parts[] = $this->faker->word;
        }

        //use underscore, period or none ?
        $decision = rand(1, 3);
        if ($decision === 1) {
            $email = Inflector::underscore(implode('', $email_parts));
        } elseif ($decision === 2) {
            $email = strtolower(implode('.', $email_parts));
        } else {
            $email = strtolower(implode('', $email_parts));
        }

        $email .= '@';

        //use free, safe, reg or rnd domain?
        $decision = rand(1, 4);
        if ($decision === 1) {
            $email .= $this->faker->freeEmailDomain;
        } elseif ($decision === 2) {
            $email .= $this->faker->safeEmailDomain;
        } elseif ($decision === 3) {
            $email .= $this->faker->domainName;
        } else {
            $email .= $this->faker->domainWord . '.' . $this->faker->tld;
        }

        return $email;
    }
}
