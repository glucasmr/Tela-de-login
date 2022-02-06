<?php

Class Usuario
{
    private $pdo; //private somente é visto dentro da classe. é
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha) 
    {
        global $pdo; //dentro de cada método, deve colocar global para indicar ao método que se trata da mesma variável declarada acima
        global $msgErro;

        try { //o bloco try catch avalia se ocorre algum erro
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);// $pdo é uma instância da classe PDO. seu construtor pede estes 4 parâmetros
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome,$telefone,$email,$senha)
    {
        global $pdo;
        // verificar se já esta cadastrado(email)
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");//faz o select no banco onde algum usuario tenha o mesmo email digitado
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false //já esta cadastrada
        }
        else
        {
            // se não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios(nome,telefone,email,senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true;
        }
        
    }

    public function logar($email,$senha)
    {
        global $pdo;
    }


}

?>