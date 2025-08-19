<?php 

trait Logger {
    private function log(string $mensagem) {
        echo "Log: $mensagem\n";
    }
}

trait Timestamp {
    private $criadoEm;

    private function setCriado() {
        $this->criadoEm = date('Y-m-d H:i:s');        
    }
}

trait Notificacao {
    public function enviarEmail($mensagem) {
        echo "Enviando e-mail para $this->email: $mensagem\n";
    }

    public function enviarSMS($mensagem) {
        echo "Enviando SMS para $this->telefone: $mensagem\n";
    }
}

class Aluno {
    use Logger, Timestamp, Notificacao;
    
    function __construct(private string $nome, private string $email, private string $telefone ) {
        $this->setCriado();
        $this->log("Aluno $this->nome criado em $this->criadoEm");
        $this->enviarSMS("Seu cadastro está pronto!");
    }
}

$elesbao = new Aluno ("Elesbão", "elesbao@email.com", "(59) 9988-7766");
$elesbao->enviarEmail("Bem-vindo ao curso!");

/*
Log: Aluno Elesbão criado em 2025-08-19 20:28:58
Enviando SMS para (59) 9988-7766: Seu cadastro está pronto!
Enviando email para elesbao@email.com: Bem-vondo ao curso!
*/