<?php

namespace  AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Note;
use AppBundle\Entity\Category;
use AppBundle\Entity\AppBundle\Entity;

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
		
		// create category 
		$category = new Category();
		$category->setTitle("this is a category title");

		
		// create note 
		$note = new Note();
		$note->setTitle("this is my title");
		$note->setDescription("this is a description");
		
		// link note <-> category
		$note->setCategory($category);
		
		// fetches Doctrine's entity manager object
		$em = $this->getDoctrine()->getManager();
		
		$em->persist($category);
		
		// tells Doctrine to "manage" the $product object. 
		// This does not actually cause a query to be made to the database (yet).
		$em->persist($note);
		
		// When the flush() method is called, Doctrine looks 
		// through all of the objects that it's managing to see if they need to be persisted to the database. 
		// In this example, the $product object has not been persisted yet, 
		// so the entity manager executes an INSERT query and a row is created in the product table.
		$em->flush();
	
		return new Response('Created note id '.$note->getId());
	}
	
	/**
	 * @Route("/note/show/{id}")
	 *
	 */
	public function showNote($id)
	{
		$note = $this
		->getDoctrine()
		->getRepository('AppBundle:Note')
		->find($id);
	
		if (!$note) {
			throw $this->createNotFoundException(
					'No Note found for id '.$id
			);
		}
	
		// ... do something, like pass the $product object into a template
	}
}

?>