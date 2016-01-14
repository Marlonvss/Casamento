<?php

class mensagem {

    public $id;
    public $nome;
    public $email;
    public $mensagem;
    public $respondida;

    public function isValid() {
        if ($this->nome == "") {
            return false;
        } else if ($this->mensagem == "") {
            return false;
        } else if ($this->email == "") {
            return false;
        } else {
            return true;
        }
    }

}
