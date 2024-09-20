<?php

namespace App\DataFixtures;

use App\Entity\Ampsettings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        //   USER

        $user = new User();
        $user->setUsername('mathieuemail');
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'mathieu');
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);
        $user->setEmail('contact@mathieulp.fr');
        $user->setConnectionType('email');

        $user2 = new User();
        $user2->setUsername('mathieuphone');
        $hashedPassword2 = $this->passwordHasher->hashPassword($user2, 'mathieu');
        $user2->setPassword($hashedPassword2);
        $user2->setRoles(['ROLE_USER']);
        $user2->setPhone('0782917075');
        $user2->setConnectionType('phone');

        $manager->persist($user);
        $manager->persist($user2);

        //   AMPSETTINGS

        $ampsettings = new Ampsettings();
        $ampsettings->setFirstname('Angus');
        $ampsettings->setLastname('Young');
        $ampsettings->setGroupe('AC/DC');
        $ampsettings->setGain(5);
        $ampsettings->setTreble(10);
        $ampsettings->setMiddle(10);
        $ampsettings->setBass(5);
        $ampsettings->setUser($user);
        $user->addAmpsetting($ampsettings);

        $manager->persist($ampsettings);

        $manager->flush();
    }
}
