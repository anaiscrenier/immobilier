<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LangueController extends AbstractController
{
    /**
     * @Route("/langue/{locale}", name="langue")
     */
    public function langue(Request $request, $locale)
    {
        $request->getSession()->set('_locale', $locale); 
        return $this->redirect($request->headers->get('referer'));
        
    }
}
