<?php


namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CvController extends Controller
{
    public function indexCvAction() {

    }

    public function newCvAction() {

    }

    public function createCvAction() {

    }

    public function updateCvAction() {

    }

    public function editCvAction() {

    }

    public function deleteCvAction() {

    }

    public function findAllCvByUserAction() {
        $request = $this->get('request_stack');
        $currentUserId = $request->getCurrentRequest()->attributes->get('userId');
        $cvList = $this->container->get('cv_manager')->findAllCvByUser($currentUserId);
        if (!empty($cvList)) {
            return $this->render('AdminBundle:Cv:cv_user_list.html.twig',
                array(
                    'cv' => $cvList
                )
            );
        }
        return $this->render('@Admin/Dashboard/new_cv.html.twig',
            array(
                'user' => $currentUserId
            ));
    }

}