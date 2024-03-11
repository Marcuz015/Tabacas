<?php
require_once './class/Database';

if (isset($_POST['cadastrar'])) {
    $pessoa = new Pessoa();
    $pessoa->email = $_POST['txt_email'];
    $pessoa->senha = $_POST['txt_senha'];
    $resultadoCadastro = $pessoa->cadastrar();

    if ($resultadoCadastro) {
        echo "Cadastro bem-sucedido!";
    } else {
        echo "Erro no cadastro!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="login.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="Btnvolta">
        <a href="../index/index.html"> <img src="../img/seta.png" alt="" class="Btnvolta"></a>
    </div>  
    <div>
        <div class="login-box">
            <form method="post" action="">
                
                <div class="user-box">
                    <input type="text" name="txt_email" placeholder="Digite seu email">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="txt_senha" placeholder="Digite sua senha" >
                    <label>Senha</label>
                </div>
                <div class="Login-box">
                    <button type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </form>
            <div class="Logotime" ><img src="../img/LogoTime-removebg-preview.png" alt=""></div>
        </div>
    </div>
</body>
</html>
