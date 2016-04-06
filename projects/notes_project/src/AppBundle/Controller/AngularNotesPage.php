<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Simple Controller to show the Angular Site
 * 
 * @author Norman Suesstrunk
 */
class AngularNotesPage extends Controller
{
    /**
     * @Route("/angular", name="angularTutorial")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/notes.angular.html.twig');
    }
}
