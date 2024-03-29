<?php

class Posicao {

    private ?int $id;
    private ?string $nome;
    private ?string $descricao;
    
    public function __toString()
    {
        return $this->nome;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}

?>