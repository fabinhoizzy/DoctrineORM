<?php

use Fabio\Doctrine\Entity\Course;
use Fabio\Doctrine\Entity\Student;
use Fabio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

$student = $entityManager->find(Student::class, $studentId);
$course = $entityManager->find(Course::class, $courseId);

$student->enrollInCourse($course);

$entityManager->flush();