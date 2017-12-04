<?php
namespace ueb05\web;

require_once("model.php");

$page = isset($_GET["page"]) ? $_GET["page"] : "welcome";
$pc = getPage($page);
?>
<html lang="de">
<?php include "head.html"?>
<body>
<?php include "nav.html"; ?>
<main role="main" class="container">
    <?php include $pc;?>
</main>
<?php include "footer.html"?>
</body>
</html>
