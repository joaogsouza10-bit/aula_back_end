<?php
// Exibe informações do usuário e do servidor

echo "<h2>Informações do Acesso</h2>";

$ip = $_SERVER['REMOTE_ADDR']; // IP do usuário
$navegador = $_SERVER['HTTP_USER_AGENT']; // Navegador e sistema operacional
$servidor = gethostname(); // Nome do servidor
$versaoPHP = phpversion(); // Versão do PHP instalada

echo "📱 IP do usuário: " . $ip . "<br>";
echo "🌐 Navegador: " . $navegador . "<br>";
echo "💻 Servidor: " . $servidor . "<br>";
echo "⚙️ Versão do PHP: " . $versaoPHP . "<br>";
?>