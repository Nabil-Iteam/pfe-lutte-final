<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\CreatorEntityInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;


class CreatorEntitySubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function getCreatorUser(RequestEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        $token = $this->tokenStorage->getToken();

        if (null === $token) {
            return;
        }

        /** @var UserInterface $creator */
        $creator = $token->getUser();

        if (!$entity instanceof CreatorEntityInterface || Request::METHOD_POST !== $method) {
            return;
        }

        $entity->setCreatedBy($creator);
    }


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['getCreatorUser', EventPriorities::PRE_WRITE]
        ];
    }
}