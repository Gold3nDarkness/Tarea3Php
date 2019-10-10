<?php

$year = date('Y');

$directory = (isset($_GET['page'])) ? "../" : "";

$footer = <<<EOF
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#"><i class="fa fa-arrow-up"></i> volver arriba</a>
    </p>
    <p>Estudiantes © {$year}
  </div>
</footer>

<script type="text/javascript" src="{$directory}assets\js\plugin\jquery\jquery.js"></script>
<script type="text/javascript" src="{$directory}assets\js\bootstrap.bundle.js"></script>
<script type="text/javascript" src="{$directory}assets\js\bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="{$directory}assets\css\bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="{$directory}assets\css\bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="{$directory}assets\css\bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
EOF;

function printFooter(){
    echo $GLOBALS['footer'];
}