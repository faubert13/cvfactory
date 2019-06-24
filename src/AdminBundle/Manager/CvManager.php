<?php


namespace AdminBundle\Manager;


use CoreBundle\Entity\Repository\CvRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CvManager
{
    protected $container;

    protected $cvRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function findAllCvByUser($userId)
    {
        return $this->container->get('cv_repository')->findByUser($userId);
    }
}