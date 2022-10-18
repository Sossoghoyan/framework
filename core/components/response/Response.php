<?php

namespace core\components\response;

class Response
{
    public function __construct(
        protected $response,
        protected int $code = 200
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function __toString(): string
    {
        http_response_code($this->code);

        if (is_array($this->response)) {
            return json_encode($this->response);
        }

        if (is_object($this->response) && !method_exists($this->response, '__toString')) {
            throw new \Exception(
                sprintf('%s must implement %s method', $this->response::class, '__toString')
            );
        }

        return $this->response;
    }
}