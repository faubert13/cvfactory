<?php
namespace AdminBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(service="admin.dashboard_controller")
 */
class DashboardController extends Controller {
    public function indexAction(){
        return $this->render(
            'AdminBundle:Dashboard:index.html.twig',
            array(

            ));
    }
}
