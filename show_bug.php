<?php

// show_bug.php      <id>

require_once "bootstrap.php";

$theBugId = $argv[1];

// this works
/**
 * @var Bug $bug
 */

// this nope, why
// @var Bug $bug
$bug =  $entityManager->find("Bug", (int)$theBugId);


echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";

