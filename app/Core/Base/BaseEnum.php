<?php

namespace App\Core\Base;

abstract class BaseEnum
{

    /**
     * Get All constants
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getConstants()
	{
		return (new \ReflectionClass(static::class))->getConstants();
	}

    /**
     * Exchanges all keys with their values
     *
     * @return array|null
     * @throws \ReflectionException
     */
    public static function flipConstants()
	{
		return array_flip(static::getConstants());
	}

    /**
     * Get constant name
     *
     * @param $key
     * @return mixed|null
     * @throws \ReflectionException
     */
    public static function constantName($key)
	{
		$constants = static::flipConstants();

		return in_array($key, array_keys($constants))? $constants[$key] : null;
	}

    /**
     * Friendly names for constants
     *
     * @return array
     */
    public static function labels()
	{
		return [];
	}

    /**
     * Get constant friendly name
     *
     * @param $key
     * @return mixed|null
     * @throws \ReflectionException
     */
    public static function title($key)
	{
		$labels = static::labels();
		$constants = !empty($labels) ? $labels : static::flipConstants();

		if ( !in_array($key, array_keys($constants))) {
			return null;
		}

		return !empty($labels) ? $constants[$key] : str_replace('_', ' ', ucwords($key, '_'));
	}

    /**
     * Check if constant value exists
     *
     * @param $key
     * @return bool
     * @throws \ReflectionException
     */
    public static function exists($key)
	{
		return in_array($key, static::getConstants());
	}
}