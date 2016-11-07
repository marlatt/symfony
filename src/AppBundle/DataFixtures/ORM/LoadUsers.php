<?php
/**
 * Created by PhpStorm.
 * User: marlatt
 * Date: 11/3/16
 * Time: 10:10 AM
 */

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUsers implements FixtureInterface
{
  public function load(ObjectManager $manager) {
    // TODO: Implement load() method.
    // TODO: Create and Persist Objects
    $user1 = new User();
    $user1->setName('John');
    $user1->setBio('He is a cool guy');
    $user1->setEmail('john@mava.info');
    $manager->persist($user1);

    $user2 = new User();
    $user2->setName('Jack');
    $user2->setBio('He is a cool guy too');
    $user2->setEmail('jack@mava.info');
    $manager->persist($user2);

    $manager->flush();
  }
}