<?php

namespace App\Controller;

use App\Entity\Maison;
use App\Form\MaisonType;
use App\Repository\MaisonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminMaisonsController extends AbstractController
{
    /**
     * @Route("/admin/maisons", name="admin_maisons")
     */
    public function index(MaisonRepository $maisonRepository)
    {
        $maisons = $maisonRepository->findAll(); 

        return $this->render('admin/AdminMaisons.html.twig', [
            'maisons' => $maisons,
        ]);
    }



    /**
     * @Route("/admin/maison/create", name="admin_maison_create")
     */

    public function createMaison(Request $request)
    {
        $maison = new Maison(); 
        $form = $this->createForm(MaisonType::class,$maison); 
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager(); 
            $manager->persist($maison); 
            $manager->flush();
            return $this->redirectToRoute('admin_maisons');
        }

        return $this->render('admin/AdminMaisonForm.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/maison/update-{id}", name="admin_maison_update")
     */
    public function updateMaison(MaisonRepository $maisonRepository, $id, Request $request)
    {
        $maison = $maisonRepository->find($id); 
        $form = $this->createForm(MaisonType::class,$maison); 
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager(); 
            $manager->persist($maison); 
            $manager->flush();
            return $this->redirectToRoute('admin_maisons');
        }
        return $this->render('admin/AdminMaisonForm.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/maison/delete-{id}", name="admin_maison_delete")
     */
    public function deleteMaison(MaisonRepository $maisonRepository, $id)
    {
        $maison =$maisonRepository->find($id);
        $manager =$this->getDoctrine()->getManager(); 
        $manager->remove($maison); 
        $manager->flush();
        return $this->redirectToRoute('admin_maisons'); 
    }
}