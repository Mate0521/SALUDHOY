<?php
require("models/persona.php");
require("models/paciente.php");
require("models/medico.php");

$pid = base64_decode($_GET["pid"]);
include($pid);
?>