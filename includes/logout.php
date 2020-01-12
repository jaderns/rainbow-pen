<?php
use App\Index;
use App\SessionManager;

require_once __DIR__.'/../src/SessionManager.php';

SessionManager::logout();
header('location: /rainbow/public/index.php');
