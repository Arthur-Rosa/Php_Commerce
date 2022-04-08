<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GaelGraf</title>
    <link rel="stylesheet" href="../../css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/barra-lateral-css/barra-lateral-css.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/lg-css/lg-css.css">
</head>

<body>
    <main>
    <fieldset>
        <form method="post" action="verificaLogin.php">

            
                <label>Nome</label>
                <input type="text" maxlength="60" placeholder="Digite seu Nome" name="nome">

                <hr>

                <label>Senha</label>
                <input type="password" maxlength="18" placeholder="Digite sua Senha" name="senha">

                <button role="button" type="submit" class="btn btnall btneffect">ENTRAR</button>

                
        </form>
        <p>Caso não tenha uma conta, cadastre-se !</p><div class="bg-btn"><button role="button" type="submit" class="btn cadas btn-success" onclick="window.location.href = 'https://api.whatsapp.com/send?phone=5511973442394&text=Ol%C3%A1%2C%20estou%20interessado%20em%20criar%20uma%20conta%20na%20GaelGraf%20%21' ">CADASTRAR-SE</button></div>
            
        </fieldset>
    </main>
</body>

</html>