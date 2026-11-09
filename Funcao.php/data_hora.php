<?php
date_default_timezone_set("America/Sao_Paulo");

echo "Data atual: " . date("d/m/Y") . "<br>";
echo "Hora atual: " . date("H:i:s") . "<br>";
echo "Daqui a 7 dias: " . date("d/m/Y", strtotime("+7 days"));
?>