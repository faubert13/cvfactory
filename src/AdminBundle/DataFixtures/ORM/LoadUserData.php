<?php
namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use CoreBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;


/**
 * Classe permettant d'insérer des données dans la table user
 */
class LoadUserData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface, ORMFixtureInterface
{
    private $encoder;
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }
    /**
     * {@inheritdoc}
     *
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $encoder = $this->container->get('security.password_encoder');

        $passwordSuperAdmin = 'superadminpass';
        $passwordAdmin = 'adminpass';
        $passwordCustomer = 'customerpass';

        // Super Admin
        $superAdminUser = new User();

        $password = $encoder->encodePassword($superAdminUser, $passwordSuperAdmin);

        $superAdminUser
            ->setPassword($password)
            ->setLastName('Aubert')
            ->setFirstName('Flavien')
            ->setJob('Développeur web')
            ->setEmail('flavien.aubert88@gmail.com')
            ->setUsername('flavien.aubert88@gmail.com')
            ->setRole('ROLE_SUPER_ADMIN')
            ->setisActive(true)
            ->setImgName('avatar_base.jpg');
        ;

        $manager->persist($superAdminUser);
        $manager->flush();

        // Super Admin
        $superAdminUser = new User();

        $password = $encoder->encodePassword($superAdminUser, $passwordSuperAdmin);

        $superAdminUser
            ->setPassword($password)
            ->setLastName('Capable')
            ->setFirstName('Alain')
            ->setJob('Directeur technique')
            ->setEmail('alain.capable@dabou.com')
            ->setUsername('alain.capable@dabou.com')
            ->setRole('ROLE_SUPER_ADMIN')
            ->setisActive(true)
            ->setImgName('avatar_base.jpg');
        ;

        $manager->persist($superAdminUser);
        $manager->flush();

        // Admin
        $adminUser = new User();

        $password = $encoder->encodePassword($adminUser, $passwordAdmin);

        $adminUser
            ->setPassword($password)
            ->setLastName('Peuplu')
            ->setFirstName('Jean')
            ->setJob('Chef de projet')
            ->setUsername('jean.peuplu@dabou.com')
            ->setEmail('jean.peuplu@dabou.com')
            ->setRole('ROLE_ADMIN')
            ->setisActive(true)
            ->setImgName('avatar_base.jpg');
        ;

        $manager->persist($adminUser);
        $manager->flush();

        // Customer
        $customerUser = new User();

        $password = $encoder->encodePassword($customerUser, $passwordCustomer);

        $customerUser
            ->setPassword($password)
            ->setLastName('Lambda')
            ->setFirstName('Client')
            ->setUsername('client.lambda@dabou.com')
            ->setEmail('client.lambda@dabou.com')
            ->setRole('ROLE_CUSTOMER')
            ->setisActive(true)
            ->setImgName('avatar_base.jpg');
        ;

        $manager->persist($customerUser);
        $manager->flush();
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
