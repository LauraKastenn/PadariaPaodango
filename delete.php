<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM product WHERE id=$id";

if ($conn->query($sql) === true) {
    echo "Produto excluído com sucesso. <a href='read.php'>Ver produtos</a>";
} else {
    echo "Erro: " . $sql . '<br>' . $conn->error;
}
$conn->close();
?>