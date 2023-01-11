<?php

namespace Roolith\Filemanager\Transformer;

abstract class Transformer
{
    /**
     * Transform single collection
     *
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);
}