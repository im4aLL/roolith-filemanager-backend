<?php

namespace Roolith\Filemanager\Interfaces;

interface FileSystemInterface
{
    /**
     * Folder path
     *
     * @param $path
     * @return $this
     */
    public function folder($path);

    /**
     * Get result
     *
     * @return array
     */
    public function get();

    /**
     * Get JSON string
     *
     * @return string
     */
    public function getJson();

    /**
     * Get json response
     *
     * @return json
     */
    public function getJsonResponse();
}