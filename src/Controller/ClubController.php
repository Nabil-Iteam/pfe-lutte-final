<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use App\Repository\ClubRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/club")
 */
class ClubController extends AbstractController
{
    /**
     * @Route("/", name="app_club_index", methods={"GET"})
     */
    public function index(ClubRepository $clubRepository): Response
    {
        return $this->render('club/index.html.twig', [
            'clubs' => $clubRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_club_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ClubRepository $clubRepository,UserRepository $userRepository,SluggerInterface $slugger): Response
    {
        if ($this->getUser()->isHasClub()){
            return $this->redirectToRoute('app_club_edit', [], Response::HTTP_SEE_OTHER);

        }
        $club = new Club();
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clubLogo = $form->get('image')->getData();
            if ($clubLogo) {
                $originalFilename = pathinfo($clubLogo->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$clubLogo->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $clubLogo->move(
                        $this->getParameter('app.path.club_logo'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    dump($e);
                    // ... handle exception if something happens during file upload
                }


                $club->setImage($newFilename);
            }

            $club->setCreatedBy($this->getUser());

            $clubRepository->add($club, true);
            $user = $userRepository->find($this->getUser());
            $user->setHasClub(1);
            $userRepository->add($user,true);


            return $this->redirectToRoute('app_club_edit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('club/new.html.twig', [
            'club' => $club,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_club_show", methods={"GET"})
     */
    public function show(Club $club): Response
    {
        return $this->render('club/show.html.twig', [
            'club' => $club,
        ]);
    }

    /**
     * @Route("/edit/my", name="app_club_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ClubRepository $clubRepository): Response
    {
        $club = $clubRepository->findOneBy(['createdBy'=>$this->getUser()]);
        $image = $club->getImage();
        $club->setImage(null);
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clubRepository->add($club, true);

            return $this->redirectToRoute('app_club_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('club/edit.html.twig', [
            'club' => $club,
            'form' => $form,
            'image'=>$image
        ]);
    }

    /**
     * @Route("/{id}", name="app_club_delete", methods={"POST"})
     */
    public function delete(Request $request, Club $club, ClubRepository $clubRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$club->getId(), $request->request->get('_token'))) {
            $clubRepository->remove($club, true);
        }

        return $this->redirectToRoute('app_club_index', [], Response::HTTP_SEE_OTHER);
    }
}
