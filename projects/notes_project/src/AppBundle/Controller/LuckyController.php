<?php

namespace  AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * First Controller 
 * 
 * Tutorial: https://symfony.com/doc/current/book/page_creation.html
 *   
 * @author Norman Suesstrunk 
 *
 */
class LuckyController extends Controller
{
    /**
     * Return plain html
     * 
     * @Route("/lucky/number")
     */
    public function luckyNumber()
    {
        $luckyNumber = rand(0, 100);
        
        /**
         * how to get the twig service.
         * but there is a shortcut version for this
         */
        /*
        // get the twig templating service 
        $twing_engine = $this->container->get('templating');         
        // render the template 
        $html = $twing_engine->render('lucky/number.html.twig', array('luckyNumber'=> $number)); 
		*/
        
        
        $html = $this->render(
        		'lucky/number.html.twig',
        		array('luckyNumber' => $luckyNumber))
        ->getContent(); // get content is needed otherwise the header will be printed to the page too
        
        // get a logger and debug the local variables 
        /*
        $logger = $this->get('logger');
        $logger->debug('Local Variables: ', get_defined_vars());
        */
        
        return new Response($html);
    }
 	
    /**
     * @Route("/api/lucky/number")
     */
    public function apiLuckyNumber() 
    {
    	$data = array(
    		'luck_number' => rand(0, 100),	
    	);
    	
    	return new Response(json_encode($data), 200, array('Content-Type' => 'application/json'));
    }
    
    
    /**
     * Example with parameter in url (Dynamic URL)
     * 
     * @Route ("/lucky/numberCount/{count}")
     */
    public function luckyNumberCount($count) {
    	$numbers = array();
    	
    	for($i=0; $i < $count; $i++) {
    		$numbers[] = rand(0,100);
    	}
    	$numbersList = implode(', ', $numbers);
    	
    	return new Response('<html><body>'.$numbersList.'</body></html>');
    	
    }
    
    
 
}

?>