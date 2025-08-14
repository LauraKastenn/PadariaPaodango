<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO product (name, description, price, stock) 
            VALUES ('$name', '$description', '$price', '$stock')";

    if ($conn->query($sql) === true) {
        echo "Novo produto adicionado com sucesso.";
    } else {
        echo "Erro: " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>

<h2>Adicionar Produto</h2>
<form method="POST" action="create.php">
    <label>Nome:</label>
    <input type="text" name="name" required><br><br>

    <label>Descrição:</label>
    <textarea name="description"></textarea><br><br>

    <label>Preço:</label>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Estoque:</label>
    <input type="number" name="stock" required><br><br>

    <input type="submit" value="Adicionar">
</form>

<a href="read.php">Ver Produtos</a>
</body>
</html>