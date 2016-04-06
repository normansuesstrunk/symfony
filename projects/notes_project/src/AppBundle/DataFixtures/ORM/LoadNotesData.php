<?php
// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Note;

class LoadNotesData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$note = new Note();
		$note->setTitle('learn angular');
		$note->setDescription('learn the angularjs framework from the tutorial');

		$manager->persist($note);
		$manager->flush();
		
		$note = new Note();
		$note->setTitle('logging in symfony');
		$note->setDescription('check out how write log messages to the consoler in symfony');
		
		$manager->persist($note);
		$manager->flush();
	}
}
?>