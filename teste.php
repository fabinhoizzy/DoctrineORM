<?php

use Fabio\Doctrine\Helper\EntityManagerCreator;

require_once "vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

var_dump($entityManager);
