<?php 

trait Email {
    private function enviar(string $mensagem) {
        echo "Enviado por e-mail: $mensagem\n";
    }
}

trait SMS {
    private function enviar(string $mensagem) {
        echo "Enviado por SMS: $mensagem\n";
    }
}

class Aluno {
    use Email, SMS {
        Email::enviar insteadof SMS;
        SMS::enviar as enviarSMS;
    }
    
    function __construct() {
        $this->enviar("Aluno criado!");
        $this->enviarSMS("Aluno criado!");
    }
}

$elesbao = new Aluno();
/*
Enviado por e-mail: Aluno criado!
Enviado por SMS: Aluno criado!
*/