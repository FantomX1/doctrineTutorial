<?php



require_once "bootstrap.php";

// b, e, r, p probably servers as a reference to the entities and to select from them, here it must be
// when array hydtratation
$dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e ".
       " JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
//$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();



foreach ($bugs as $bug) {

    echo $bug['description'] . " - " . $bug['created']->format('d.m.Y')."\n";
    echo "  Reported by: ".$bug['reporter']['name']."\n";
    echo "  Assigned to: ".$bug['engineer']['name']."\n";
    foreach ($bug['products'] as $product) {
        echo "  Platform: ".$product['name']."\n";
    }
    echo "\n";
}
