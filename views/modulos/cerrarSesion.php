<?php
require_once './config/global.php';

session_destroy();
header("Location: index.php?&action=inicio");  

