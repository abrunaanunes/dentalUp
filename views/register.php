<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo!</h2>
                <p class="description description-primary">Para se conectar, logue com suas informações.</p>
                <a href="/">
                    <button id="signin" class="btn btn-primary">Entrar</button>
                </a>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Ou crie uma conta</h2>
                <p class="description description-second">usando seu e-mail para se registrar:</p>
                <?php 
                  if(!empty($data)) {
                    foreach($data as $message) {
                      echo '<span style="font-size: 14px; font-weight: 300; line-height: 18px; color: red;">' . $message . '</span>';
                    }
                  }
                ?>
                <form class="form" action="<?php echo 'http://' . $_SERVER['HTTP_HOST']. '/user/store'; ?>" method="post">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" name="name">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="E-mail" name="email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password">
                    </label>
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Confirme sua senha" name="confirm_password">
                    </label>
                    <button class="btn btn-second">Registrar-se</button>        
                </form>
            </div>
        </div>
</body>
</html>