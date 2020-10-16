<?php

session_start();

if (isset($_SESSION['fightoutcome'])) {
    extract($_SESSION['fightoutcome']);
    $battlestarted = true;
} else {
    $battlestarted = false;
}

$_SESSION['fightoutcome'] = null;

require 'index_view.php';