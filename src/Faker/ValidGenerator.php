<?php

namespace Faker;

/**
 * Proxy for other generators, to return only valid values. Works with
 * Faker\Generator\Base->valid()
 */
class ValidGenerator
{
    protected Generator $generator;
    protected $validator;
    protected int $maxRetries;

    public function __construct(Generator $generator, ?callable $validator = null, int $maxRetries = 10000)
    {
        if (is_null($validator)) {
            $validator = function () {
                return true;
            };
        } elseif (!is_callable($validator)) {
            throw new \InvalidArgumentException('valid() only accepts callables as first argument');
        }

        $this->generator = $generator;
        $this->validator = $validator;
        $this->maxRetries = $maxRetries;
    }

    /**
     * Catch and proxy all generator calls but return only valid values
     *
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return $this->__call($attribute, []);
    }

    /**
     * Catch and proxy all generator calls with arguments but return only valid values
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $i = 0;

        do {
            $res = call_user_func_array(array($this->generator, $name), $arguments);

            $i++;

            if ($i > $this->maxRetries) {
                throw new \OverflowException(sprintf('Maximum retries of %d reached without finding a valid value', $this->maxRetries));
            }
        } while (!call_user_func($this->validator, $res));

        return $res;
    }
}
