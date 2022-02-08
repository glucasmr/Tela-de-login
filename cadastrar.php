<?php
    require_once 'CLASSES/usuarios.php'; //faz o link com o documento que possui a classe usuarios
    $u = new Usuario;
?> 


<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Cadastrar</title>
        <link rel="stylesheet" href="CSS/estilo.css">
    </head>
    <body>
    <div id="corpo-form-cad">    
    <h1>Cadastrar</h1>
        <form method="POST"><!-- ao inves de chamar o arquivo.php, faremos o processamento dentro deste própio arquivo-->
            <input type = "text" name="nome" placeholder="Nome completo" maxlength="30"> <!-- maxlength de acordo com o tamanho máximo dos parâmetros do BD -->
            <input type = "text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type = "email" name="email" placeholder="Usuário" maxlength="40">
            <input type = "password" name="senha" placeholder="Senha" maxlength="15">
            <input type = "password" name="confSenha" placeholder="Confirmar senha">
            <input type = "submit"value="Cadastrar">
          </form>
    </div>
    <?php
    // verificar se clicou no botao cadastrar
    if (isset($_POST['nome'])) // isset verifica a existência de uma variável ou array. Vai verificar se colheu atributos name = nome
    {
        $nome = addslashes($_POST['nome']); //pega a informação colhida pelo POST e guarda numa variável. Por medida de segurança, usamos o addslashes para garantir que não ocorra injeção de código
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']); //o parâmetro passado para $_POST[''] deve ser idêntico ao name que estava no form 
        
        //verificar se está completamente preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("projeto_login","localhost","root","");//acessa o método conectar da classe usuarios. por padrão o login e senha do XAMPP são "root" e ""
            if($u->msgErro == "") //se está vazia significa que não deu erro 
            {
                if($senha==$confirmarSenha)
                {
                    if($u->cadastrar($nome,$telefone,$email,$senha)) //caso o return seja true, cadastrado com sucesso
                    {
                        echo "Cadastrado com sucesso! Acesse para entrar!";
                    }
                    else
                    {
                        echo "Email já cadastrado!";
                    }

                }
                else
                {
                    echo "Senha e confirmar senha não correspondem!";
                }
                
            }
            else
            {
                echo "Erro: ".$u->msgErro;
            }
        
        }
        else
        {
            echo "Preencha todos os campos!";
        }




    }



    ?>
    </body>
</html>