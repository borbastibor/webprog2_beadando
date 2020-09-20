<?php
namespace includes\classes;

use \JsonSerializable;

class Response implements JsonSerializable {

    public int $error;
    public string $message;

    public function __construct(bool $error = false, string $message) {
        $this->error = $error ? 1 : 0;
        $this->message = $message;
    }

    public function jsonSerialize() {
        return ["error" => $this->error, "message" => $this->message];
    }

}