<?php

require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';

// For this to work properly, the class must be the same as the file
function __autoload($class) {

require "libs/$class.php";

}

/*
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

// Library
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';
*/


$app = new Bootstrap();