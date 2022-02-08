<?php
    require_once 'CLASSES/usuarios.php'; //faz o link com o documento que possui a classe usuarios
    $u = new Usuario;
?> 


<html lang="pt-br"> 
    <head>
        <meta charset="utf-8"/>
        <title>Projeto de Login</title>
        <link rel="stylesheet" href="CSS/estilo.css">
    </head>
    <body>
    <div id="corpo-form">    
    <h1>Entrar</h1>
        <form method="POST"><!-- ao inves de chamar o arquivo.php, faremos o processamento dentro deste própio arquivo-->
            <input type = "email"  name="email" placeholder="Usuário">
            <input type = "password"  name="senha" placeholder="Senha">
            <input type = "submit"value="ACESSAR">
            <a href="cadastrar.php" >Ainda não é inscrito?<strong>Cadastre-se</strong></a> <!-- link da tag <a> é o cadastrar.php-->
        </form>
    </div>
    <?php
        if (isset($_POST['email'])) // isset verifica a existência de uma variável ou array.Vai verificar se colheu atributos name = nome, ouseja, se o botão foi clicado
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
            if(!empty($email) && !empty($senha)) //verificar se está completamente preenchido
            {
                $u->conectar("projeto_login","localhost","root",""); //realiza a conexão com o banco
                if($u->$msgErro == "")  //verifica se ocorreu algum erro de conexão
                {
                    if($u->logar($email,$senha)) //verifica se foi possível logar
                    {
                        //inicia sessão
                        header("location: areaPrivada.php");
                    }
                    else
                    {
                    //não foi possível acessar
                    ?>
                        <div class="msg-erro">
                            Email e/ou senha estão incorretos!
                        </div>                        
                    <?php
                    }
                } 
                else
                {
                ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro; ?>
                    </div>                        
                <?php    
                }  
            }
            else
            {
            ?>
                <div class="msg-erro">
                    Preencha todos os campos
                </div>                        
            <?php
            }
        }
    ?>
    </body>
</html>