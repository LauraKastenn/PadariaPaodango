<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE product 
            SET name='$name', description='$description', price='$price', stock='$stock' 
            WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Produto atualizado com sucesso. <a href='read.php'>Ver produtos</a>";
    } else {
        echo "Erro: " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit();
}

$sql = "SELECT * FROM product WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>

<h2>Editar Produto</h2>
<form method="POST" action="update.php?id=<?php echo $row['id']; ?>">
    <label>Nome:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label>Descrição:</label>
    <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

    <label>Preço:</label>
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required><br><br>

    <label>Estoque:</label>
    <input type="number" name="stock" value="<?php echo $row['stock']; ?>" required><br><br>

    <input type="submit" value="Atualizar">
</form>

<a href="read.php">Ver Produtos</a>
</body>
</html>
