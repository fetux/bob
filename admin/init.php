<?php
session_start();

include '../cnx.php';
// Include the main Propel script
/*
require_once 'vendor/propel/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("build/conf/bobmilanga-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("orm/" . PATH_SEPARATOR . get_include_path());