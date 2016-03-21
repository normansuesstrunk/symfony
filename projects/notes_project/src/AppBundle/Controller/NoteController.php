<?php

namespace  AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Note;

/**
 * Notes Controller
 *   
 * @author Norman Suesstrunk 
 *
 */
class NoteController extends Controller
{
	/**
	 * @Route("/note/create")
	 * 
	 */
	public function createNoteAction()
	{
		$note = new Note();
		$note->setTitle("this is my title");
		$note->setDescription("this is a description");
		$em = $this->getDoctrine()->getManager();
		$em->persist($note);
		$em->flush();
	
		return new Response('Created note id '.$note->getId());
	}
}

?>