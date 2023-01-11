<?php

namespace Roolith\Filemanager\Interfaces\Response;

interface ResponseInterface
{
    /**
     * Set data
     *
     * @param $data
     * @return $this
     */
    public function setData($data);

    /**
     * Set http response code
     *
     * @param $code
     * @return $this
     */
    public function setResponseCode($code);

    /**
     * Should push json response to header
     *
     * @return void
     */
    public function json();
}