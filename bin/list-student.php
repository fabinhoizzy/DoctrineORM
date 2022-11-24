<?php

use Fabio\Doctrine\Entity\Course;
use Fabio\Doctrine\Entity\Phone;
use Fabio\Doctrine\Entity\Student;
use Fabio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);
$studentList = $studentRepository->studentsAndCourses();

foreach ($studentList as $student) {
    echo "Id: $student->id\nNome: $student->name\n" ;

    if ($student->phones()->count() > 0) {
        echo "Telefones: ";
        echo implode(', ', $student->phones()
            ->map(fn(Phone $phone) => $phone->number)
            ->toArray());
    }

    if ($student->courses()->count() > 0) {
        echo "Cursos: ";
        echo implode(', ', $student->courses()
            ->map(fn(Course $course) => $course->name)
            ->toArray());
    }

    echo "\n";

    echo PHP_EOL;
}



