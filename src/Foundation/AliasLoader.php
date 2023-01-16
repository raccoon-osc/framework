<?php
/**
 * Created by PhpStorm.
 * User: levi
 * Date: 17/01/2023
 * Time: 02:36
 */

namespace OctopusOsc\Framework\Foundation;
class AliasLoader extends \Illuminate\Foundation\AliasLoader
{
    /**
     * Load a class alias if it is registered.
     *
     * @param  string  $alias
     * @return bool|null
     */
    public function load($alias)
    {
        if (static::$facadeNamespace && str_starts_with($alias, static::$facadeNamespace)) {
            $this->loadFacade($alias);

            return true;
        }

        if (isset($this->aliases[$alias])) {
            return class_alias($this->aliases[$alias], $alias);
        }
    }
}