<?php declare(strict_types = 1);

namespace Faker;

/**
 * This generator returns a default value for all called properties
 * and methods. It works with Faker\Generator\Base->optional().
 */
class DefaultGenerator
{
    protected $default;

    public function __construct($default = null)
    {
        $this->default = $default;
    }

    /**
     *
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return $this->default;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function __call(string $method, array $attributes)
    {
        return $this->default;
    }
}
