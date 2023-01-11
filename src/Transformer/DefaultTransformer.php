<?php

namespace Roolith\Filemanager\Transformer;

class DefaultTransformer extends Transformer
{

    /**
     * @inheritDoc
     */
    public function transform($item)
    {
        return [
            'status' => 'success',
            'payload' => $item,
        ];
    }
}