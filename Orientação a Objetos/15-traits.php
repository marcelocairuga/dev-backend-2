<?php 

trait Logger {
    private function log(string $mensagem) {
        echo "Log: $mensagem\n";
    }
}

trait Timestamp {
    protected $criadoEm;

    protected final function setCriadoEm() {
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

trait Contador {
    protected static int $contador = 0;

    public static function getContador(): int {
        return self::$contador;
    }
}

class Aluno {
    use Logger, Timestamp, Notificacao, Contador;
    
    function __construct(protected string $nome, protected string $email, protected string $telefone ) {
        $this->setCriadoEm();
        $this->log("Aluno $this->nome criado em $this->criadoEm");
        $this->enviarSMS("Seu cadastro está pronto!");
        self::$contador++;
    }
}

$elesbao = new Aluno("Elesbão", "elesbao@email.com", "(59) 9988-7766");
$elesbao->enviarEmail("Bem-vindo ao curso!");
$genoveva = new Aluno("Genoveva", "genoveva@xyz.br", "(59) 6677-8899");
echo "Objetos criados: " . Aluno::getContador();

/*
Log: Aluno Elesbão criado em 2025-08-20 15:24:51
Enviando SMS para (59) 9988-7766: Seu cadastro está pronto!
Enviando e-mail para elesbao@email.com: Bem-vindo ao curso!
Log: Aluno Genoveva criado em 2025-08-20 15:24:51
Enviando SMS para (59) 6677-8899: Seu cadastro está pronto!
Objetos criados: 2
*/