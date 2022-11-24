<?php

namespace Fabio\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Fabio\Doctrine\Entity\Student;

class DoctrineStudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses(): array
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin('student.phones', 'phone')
            ->leftJoin('student.courses', 'course')
            ->getQuery()
            ->getResult();
    }
}