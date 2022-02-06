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
    
    ?>
    </body>
</html>