<?php
require_once _DIR_ . '/../bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::logout();
header('Location: /index.php');
exit;