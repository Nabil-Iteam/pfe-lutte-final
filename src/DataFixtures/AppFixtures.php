<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
<<<<<<< HEAD
=======
use Faker\Factory;
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
<<<<<<< HEAD

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

=======
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $admin = new User();
        $admin->setEmail('admin@app.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'password'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $user = new User();
        $user->setEmail('user@app.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
        $manager->persist($user);
        $manager->flush();
    }
}
