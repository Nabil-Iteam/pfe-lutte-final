<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setFirstName('admin');
        $user->setLastName('lutte');
        $user->setEmail('admin@lutte.com');
        $user->setGender('M');
        $user->setBirthDay(new \DateTime('now'));
        $user->setIsValid(true);
        $user->setIsVerified(true);
        $user->setRoles( ['ROLE_USER','ROLE_ADMIN']);

        $password = $this->hasher->hashPassword($user, 'admin2022');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
