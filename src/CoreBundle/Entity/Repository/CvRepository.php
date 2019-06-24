<?php
namespace CoreBundle\Entity\Repository;

use CoreBundle\Entity\Cv;
use Doctrine\ORM\EntityManagerInterface;


class CvRepository
{
      private $repository;

      public function __construct(EntityManagerInterface $entityManager)
      {
          $this->repository = $entityManager->getRepository(Cv::class);
      }

      public function findByUserAllCv($userId)
      {
         return $this->repository->findBy(array('user_id' => $userId));
      }

}