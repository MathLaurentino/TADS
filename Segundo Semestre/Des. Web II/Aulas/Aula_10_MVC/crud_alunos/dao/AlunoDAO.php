<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    public function list()
    {
        $conn = Connection::getConnection();
        
        $sql = "SELECT a.*, c.nome AS nome_curso FROM alunos AS a JOIN cursos AS c ON c.id = a.id_curso";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $alunos = $stm->fetchAll();

        return $this->mapDbBtoObject($alunos);
    }


    public function getById(int $idAluno)
    {
        $conn = Connection::getConnection();
        
        $sql = "SELECT a.*, c.nome AS nome_curso FROM alunos AS a" . 
               " JOIN cursos AS c ON c.id = a.id_curso" .
               " WHERE a.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute(array($idAluno));
        $result = $stm->fetchAll();

        $aluno = $this->mapDbBtoObject($result);

        if ($aluno) 
            return $aluno[0];
        else 
            return null;
    }


    public function insert(Aluno $aluno)
    {
        $conn = Connection::getConnection();
        
        $sql = "INSERT INTO alunos (nome, idade, estrangeiro, id_curso) VALUES (?,?,?,?)";
        $stm = $conn->prepare($sql);    
        $stm->execute(array(
                $aluno->getNome(), 
                $aluno->getIdade(), 
                $aluno->getEstrangeiro(),
                $aluno->getCurso()->getId()
            )
        );
    }


    public function deleteById(int $idAluno)
    {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM alunos WHERE id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute(array($idAluno));
    }


    private function mapDbBtoObject(array $data) 
    {
        $alunos = array();
        foreach($data as $reg) {
            $aluno = new Aluno();
            $aluno->setId($reg["id"]);
            $aluno->setNome($reg["nome"]);
            $aluno->setIdade($reg["idade"]);
            $aluno->setEstrangeiro($reg["estrangeiro"]);

            $curso = new Curso();
            $curso->setId($reg["id_curso"]);
            $curso->setNome($reg["nome_curso"]);
            
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }
}