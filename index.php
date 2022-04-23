<?php 

require_once "controllers/controller.template.php";

require_once "controllers/controller.users.php";
require_once "models/model.users.php";

require_once "controllers/controller.incomes.php";
require_once "models/model.incomes.php";

require_once "controllers/controller.expenses.php";
require_once "models/model.expenses.php";

require_once "controllers/controller.persons.php";
require_once "models/model.persons.php";

require_once "controllers/controller.categories.php";
require_once "models/model.categories.php";

require_once "controllers/controller.debts.php";
require_once "models/model.debts.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();
