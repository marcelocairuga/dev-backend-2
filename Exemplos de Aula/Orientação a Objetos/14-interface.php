<?php 

interface Emprestavel {  
    public function emprestar(int $dias): bool;
    public function devolver(): void;
}

abstract class Item {
    protected string $titulo;
}

class Livro extends Item implements Emprestavel {
    function __construct(string $titulo) {
        $this->titulo = $titulo;
    }

    public function emprestar(int $dias): bool {
        echo "$this->titulo foi emprestado por $dias dias.\n";
        return true;
    }
    
    public function devolver(): void {
        echo "$this->titulo foi devolvido.\n";
    }
}

class Revista extends Item {
    function __construct(string $titulo) {
        $this->titulo = $titulo;
    }
}

class Emprestimo {
    private Emprestavel $item;
    private int $dias;

    function __construct(Emprestavel $item, int $dias) {
        $this->item = $item;
        $this->dias = $dias;
        $this->item->emprestar($dias);
    }
}


$livro = new Livro("PHP: A Bíblia");
$revista = new Revista("Programação em Foco");

$e1 = new Emprestimo($livro, 7);
// PHP: A Bíblia foi emprestado por 7 dias.

$e2 = new Emprestimo($revista, 10);
//  Uncaught TypeError: Emprestimo::__construct(): Argument #1 ($item) must be of type Emprestavel
