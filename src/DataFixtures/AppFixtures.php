<?php

namespace App\DataFixtures;

use App\Entity\MemberType;
use App\Entity\Member;
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

        $memberType1 = new MemberType();
        $memberType1->setName('Athlete');

        $manager->persist($memberType1);

        $memberType2 = new MemberType();
        $memberType2->setName('Coach');

        $manager->persist($memberType2);

        $memberType3 = new MemberType();
        $memberType3->setName('Refree');

        $manager->persist($memberType3);

        $memberType4 = new MemberType();
        $memberType4->setName('manager');

        $manager->persist($memberType4);

        $member = new Member();

        $password = $this->hasher->hashPassword($user, 'admin2022');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }

}
