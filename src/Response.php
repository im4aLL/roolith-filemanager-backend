<?php

namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\Response\ResponseInterface;

class Response implements ResponseInterface
{
    private $data;
    private $responseCode = 200;

    /**
     * @inheritDoc
     */
    public function setResponseCode($code)
    {
        $this->responseCode = $code;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function json()
    {
        ob_clean();
        header_remove();
        header("Content-type: application/json; charset=utf-8");
        http_response_code($this->responseCode);

        echo $this->jsonEncode();
        exit();
    }

    /**
     * Convert to JSON
     *
     * @return false|string
     */
    public function jsonEncode()
    {
        return json_encode($this->data);
    }

    /**
     * @inheritDoc
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}