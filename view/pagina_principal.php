<?php 
    if(isset($_POST['submit'])){
        require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/DAO/ClienteDAO.php';
        $c = new Cliente();
        $c->setNome($_POST['nome']);
        $c->setEmail($_POST['email']);
        $c->setTelefone($_POST['tel']);
        $c->setCpf($_POST['cpf']);
        ClienteDAO::getInstance()->insert($c);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {background-color: #f5f5dc}
        h1 {color: #120a8f}
        table {
        border-collapse: collapse;
        }

        td, th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #f2f2f2;
        }

        th {
        background-color: #120a8f;
        color: white;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <center>
            <h1>Lista de clientes</h1>
            <button onclick="location.href='cadastro.php'"><i class="fa fa-plus"></i> Cadastrar</button>
        <table border="1" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>- - -</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/conexao.php';
                    $sql = "SELECT * FROM cliente ORDER BY id DESC";
                    $p_sql = Conexao::getInstance()->prepare($sql);
                    $p_sql->execute();

                    while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['nome']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['telefone']."</td>";
                        echo "<td>".$row['cpf']."</td>.<td>
                            <a href='../controller/editar.php?id={$row['id']}'><i class='fa fa-edit'></i></a>
                            <a href='../controller/deletar.php?id={$row['id']}'><i class='fa fa-trash'></i></a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </center>
</body>
</html>