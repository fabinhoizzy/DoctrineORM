<?php

use Fabio\Doctrine\Entity\Phone;
use Fabio\Doctrine\Entity\Student;
use Fabio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Aluno com Telefones');
$student->addPhone(new Phone('(61) 9999-9999'));
$student->addPhone(new Phone('(61) 3333-1234'));

$entityManager->persist($student);
$entityManager->flush();
