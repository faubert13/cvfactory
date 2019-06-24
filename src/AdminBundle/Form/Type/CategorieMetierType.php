<?php


namespace AdminBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use doctrine\ORM\EntityManagerInterface;

class CategorieMetierType extends AbstractType
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}