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
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Criar conta</h2>
                <p class="description description-second">usando seu e-mail para se registrar:</p>
                <form class="form">
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
                        <input type="password" placeholder="Confirme sua senha" name="password">
                    </label>
                    <button class="btn btn-second">Registrar-se</button>        
                </form>
            </div>
        </div>
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo!</h2>
                <p class="description description-primary">Informe seus dados pessoais</p>
                <p class="description description-primary">e junte-se a nós.</p>
                <button id="signup" class="btn btn-primary">Registrar-se</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Entre na sua conta</h2>
                <p class="description description-second">usando seu e-mail:</p>
                <form class="form">
                
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Password" name="password">
                    </label>
                
                    <a class="password" href="#">esqueceu sua senha?</a>
                    <button class="btn btn-second">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script>
      var btnSignin = document.querySelector("#signin");
      var btnSignup = document.querySelector("#signup");

      var body = document.querySelector("body");

      btnSignin.addEventListener("click", function () {
        body.className = "sign-in-js"; 
      });

      btnSignup.addEventListener("click", function () {
          body.className = "sign-up-js";
      })
    </script>
</body>
</html>