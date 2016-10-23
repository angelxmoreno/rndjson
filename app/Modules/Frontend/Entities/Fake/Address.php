<?php
namespace RndJson\Frontend\Entities\Fake;

use Cake\Utility\Inflector;

/**
 * Class Address
 *
 * @package RndJson\Frontend\Entities\Fake\Address
 */
class Address extends FakeBase
{
    protected $properties = [
        'buildingNumber',
        'streetName',
        'streetSuffix',
        'secondaryAddress',
        'cityPrefix',
        'city',
        'citySuffix',
        'state',
        'postcode',
        'country'
    ];

    /**
     * Builds a full address
     * @return string
     */
    public function getFullAddress()
    {
        $address = '';
        foreach ($this->properties as $func) {
            $property = Inflector::underscore($func);
            $address .= $this->{$property};
            if (in_array($property, ['street_suffix', 'secondary_address', 'city_suffix'])) {
                $address .= ', ';
            } else {
                $address .= ' ';
            }
        }

        return trim($address);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $values['full_address'] = $this->getFullAddress();

        foreach ($this->properties as $func) {
            $property = Inflector::underscore($func);
            $values[$property] = $this->{$property};
        }

        return $values;
    }

    /**
     * @inheritDoc
     */
    protected function assignProperties()
    {
        foreach ($this->properties as $func) {
            $property = Inflector::underscore($func);
            $this->{$property} = $this->faker->{$func};
        }
        $this->country = 'United States of America';
    }

}
