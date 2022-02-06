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
    
    ?>
    </body>
</html>