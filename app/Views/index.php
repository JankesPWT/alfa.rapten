<?php

$artist = new Artist();
$artist->getAll();

echo '<br><br>';

$artist->getAllStmt("","Jacek");