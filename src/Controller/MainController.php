<?php

namespace App\Controller;

use App\Repository\PictureRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CommentRepository $commentRepository, PictureRepository $pictureRepository): Response
    {

        $comments = $commentRepository->findAll();
        $pictures = $pictureRepository->findAll();


        return $this->render('main/index.html.twig', [
            'comments' => $comments,
            'pictures' => $pictures,
        ]);
    }
}
