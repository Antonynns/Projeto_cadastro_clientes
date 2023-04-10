<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <center>
    <form method="POST" class="form" action="pagina_principal.php">
    <fieldset>
        <h1 id="titulo"> Cadastrar Cliente </h1>
        <div class="campo">
            <strong>
            <label> 
            Nome: <input type="text" name="nome" id="nome" maxlength="45" required>
            </label>
            <br>
            <label>
            CPF: <input type="text" name="cpf" id="cpf" maxlength="14" required>
            </label>
            <br>
            <label>
            Telefone: <input type="text" name="tel" id="tel" maxlength="14" required>
            </label>
            <br>
            <label>
            E-mail: <input type="email" name="email" id="email" required>
            </label> 
            </strong>
        </div>
        <br>
        <button class="botao" type="submit" id="cadastrar" name="submit">  Cadastrar </button>
        </fieldset>
    </form>
    </center>
</body>
</html>