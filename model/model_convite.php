<?php

include_once '../model/model_base.php';
include_once './model/model_base.php';

class convite extends base {

    public $familia;
    public $codigo;
                function __construct($_id = 0, $_familia = '', $_codigo = '') {
        $this->id = (int)$_id;
        $this->familia = (string)$_familia;
        $this->codigo = (string)$_codigo;
    }

}
