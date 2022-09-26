<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreatorEntityInterface
{
    public function setCreatedBy(UserInterface $user): CreatorEntityInterface;

}