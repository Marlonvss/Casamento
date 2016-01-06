<?php

class usuarios {

    public $id;
    public $convite;
    public $nome;
    public $origem;          /* [R|M] Rafaelle ou Marlon */
    public $genero;          /* [M|F|C] Masculino, Feminino ou Criança */
    public $confirmado;      /* [-1|0|1] Não informado, Não Confirmado ou Confirmado */
    public $dataconfirmacao;
}
