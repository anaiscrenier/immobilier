<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAppartementsController extends AbstractController
{
    /**
     * @Route("/admin/appartement", name="admin_appartement")
     */
    public function index()
    {
        return $this->render('appartement/index.html.twig', [
            'controller_name' => 'AppartementsController',
        ]);
    }
}
