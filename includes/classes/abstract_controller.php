<?php

abstract class AbstractController {

    public $baseName = '';

    abstract public function main(array $vars);

}