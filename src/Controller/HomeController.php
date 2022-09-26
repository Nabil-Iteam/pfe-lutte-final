<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\User;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
<<<<<<< HEAD
    public function index() : Response
    {
        return $this->render("home/index.html.twig");
=======
    public function index(): Response
    {

//        try {
//            $email = (new Email())
//                ->from('bacemhmoudi92@gmail.com')
//                ->to('test@gmail.com')
//                //->addCc(array())
//                ->subject('Demander une démo gratuite')
//                ->html($this->renderView('email/send.html.twig'));
//
//
//            $mailer->send($email);
//        }catch (Exception $exception){
//            dump($exception);
//        }
//        $user = new User();
//        return $this->json(
//            $user        );
//    }
        return $this->render('home/index.html.twig');
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
    }
}
