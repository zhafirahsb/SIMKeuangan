<?php
session_start();
session_destroy();
require('../url.php');
header('Location:' . $url);
