<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/DAO/ClienteDAO.php';
    // Verifica se o ID do cliente foi passado como parâmetro
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: ../view/pagina_principal.php");
        exit();
    }

    // Busca os dados do cliente no banco de dados
    $sql = "SELECT * FROM cliente WHERE id = :id";
    $p_sql = Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":id", $id);
    $p_sql->execute();
    $row = $p_sql->fetch(PDO::FETCH_ASSOC);

    // Cria um objeto cliente com os dados do banco de dados
    $cliente = new Cliente($row['id'], $row['nome'], $row['email'], $row['telefone'], $row['cpf']);

    // Verifica se o formulário foi enviado para atualização
    if(isset($_POST['editar'])) {
        // Atualiza os dados do cliente no banco de dados
        $cliente->setNome($_POST['nome']);
        $cliente->setEmail($_POST['email']);
        $cliente->setCpf($_POST['cpf']);
        $cliente->setTelefone($_POST['tel']);
        ClienteDAO::getInstance()->update($cliente);
        header("Location: ../view/pagina_principal.php");
        exit();
    }
?>

<form method="post">
    <pre>
    <fieldset>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $cliente->getNome(); ?>" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo $cliente->getEmail(); ?>" required><br>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" value="<?php echo $cliente->getCpf(); ?>" maxlength="14" required><br>

    <label for="tel">Telefone: </label>
    <input type="text" name="tel" value="<?php echo $cliente->getTelefone(); ?>" maxlength="14" required><br>

    <input type="submit" name="editar" value="Editar">
    </fieldset>
    </pre>
</form>
