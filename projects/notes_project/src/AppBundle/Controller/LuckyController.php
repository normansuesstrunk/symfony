<?php

namespace  AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * First Controller. 
 * 
 * Can be called under 
 * 
 * @author Norman Suesstrunk 
 *
 */
class LuckyController
{
    /**
     * Return plain html
     * 
     * @Route("/lucky/number")
     */
    public function luckyNumber()
    {
        $number = rand(0, 100);

        return new Response(
        	'<html><body>Lucky number: '.$number.'</body></html>'
        );
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
     * Example with parameter in url 
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