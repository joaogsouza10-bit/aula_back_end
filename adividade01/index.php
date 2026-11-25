<form action="login.php" method="post">
    Login <br>
    <input type="text" name="usuario"> <br>
    Senha <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="Entrar">
</form>

<?php
// Exibe mensagem de erro, se existir
if (isset($_GET['msg'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_GET['msg']) . "</p>";
}
?>