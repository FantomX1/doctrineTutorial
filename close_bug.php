<?php

// close_bug.php <bug-id>


require_once "bootstrap.php";


$theBugId =  $argv[1];


$bug = $entityManager->find("Bug", (int)$theBugId);
// $this->status = "CLOSE";
$bug->close();


$entityManager->flush();

