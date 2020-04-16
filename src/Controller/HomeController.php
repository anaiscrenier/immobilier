<?php

namespace App\Controller;

use App\Repository\MaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home") 
     */
    /*j'ai enlever home entre les virgules apres route pour pas faire public et hommme apres*/
    public function index(MaisonRepository $maisonRepository)
    {
        $maisons = $maisonRepository->findAll();
        $test = 'hello world'; 

        return $this->render('home/index.html.twig', [
            'maisons' => $maisons, 
        ]);
    }
}
