<?php


namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    /**
     * Affiche le widget dans le header affichant les notifications
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function widgetNotificationAction()
    {
//        /*Liste des formulaires sans action*/
//        $formWithoutAction = array();
//        if(!empty($site) && !empty($env)) {
//            $interfaceForms = $this->get('doctrine')
//                ->getRepository(InterfaceForm::class)
//                ->findAllInterfaceFormBySite($site->getId(), $env);
//
//            foreach($interfaceForms as $forms) {
//                if(empty($forms->getFormAction())) {
//                    $formWithoutAction[$forms->getId()] = $forms->getName();
//                }
//            }
//        }
        /**/


//        $number = count($formWithoutAction);

        return $this->render(
            'AdminBundle:Notification:widget_notification.html.twig',
            array(
//                'number'            => $number,
//                'formWithoutAction' => $formWithoutAction,
            ));
    }

    /**
     * Affiche la liste des notifs dans une page a part
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexNotificationAction()
    {
        $site = $this->get('site_manager')->findSiteBySession();
        $env = $this->get('environment_manager')->getEnvironment();

        /*Liste des formulaires sans action*/
        $formWithoutAction = array();
        if(!empty($site) && !empty($env)) {
            $interfaceForms = $this->get('doctrine')
                ->getRepository(InterfaceForm::class)
                ->findAllInterfaceFormBySite($site->getId(), $env);

            foreach($interfaceForms as $forms) {
                if(empty($forms->getFormAction())) {
                    $formWithoutAction[$forms->getId()] = $forms->getName();
                }
            }
        }
        /**/

        return $this->render(
            'EliophotBackBundle:Notification:index_notification.html.twig',
            array(
                'formWithoutAction' => $formWithoutAction,
            ));
    }
}