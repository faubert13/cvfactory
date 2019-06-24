<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/account")
 */
class UserController extends Controller
{
    public function indexUserListAction() {
        $users = $this->get('doctrine')
            ->getRepository('CoreBundle:User')
            ->findAll();

        $currentUser = $this->getUser();
//var_dump($users);die;
        return $this->render('AdminBundle:user/Management:list_user.html.twig', array(
            'users'       => $users,
            'currentUser' => $currentUser,
        ));
    }

    /**
     * Affiche le formulaire d'ajout d'un utilisateur
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newUserAction()
    {
        $user = new User();

        $newForm = $this->createForm($this->get('form.type.user'), $user, array(
            'create_user' => true,
        ));

        return $this->render('AdminBundle::user/Management:new_user.html.twig', array(
            'user'   => $user,
            'form'   => $newForm->createView(),
        ));
    }

    public function confirmDeleteUser(){

    }

    public function deleteUserAction(){

    }
}