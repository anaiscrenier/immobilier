<?php

namespace App\Controller;

use App\Entity\Maison;
use App\Form\MaisonType;
use App\Repository\MaisonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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

        $img1File = $form['img_1']->getData(); 



        if($form->isSubmitted() && $form->isValid()){
            
            $img1FileName = pathinfo($img1File->getClientOriginalName(), PATHINFO_FILENAME); 
            $newImg1FileName = $img1FileName.'.'.$img1File->guessExtension(); 

            try {
                $img1File->move(
                    $this->getParameter('maison_img_directory'),
                    $newImg1FileName
                ); 

            } 
            catch(FileException $e){
                $this->addFlash(
                    'danger', 
                    'Une erreur est survenu lors de l\'image'
                ); 
            }
            $maison->setImg1($newImg1FileName); 

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

        $oldImg1Name = $maison->getImg1();
        $oldImg1Path = $this->getParameter('maison_img_directory').'/'.$oldImg1Name; 
     


        $form = $this->createForm(MaisonType::class,$maison); 
        $form->handleRequest($request); 

        $img1File = $form['img_1']->getData(); 

        if($form->isSubmitted() && $form->isValid()){

            if($oldImgName != null){
               unlink($oldImg1Path); 
            }
        
            $img1FileName = pathinfo($img1File->getClientOriginalName(), PATHINFO_FILENAME); 
            // $img1FileName = md5(uniqid()); //cette ligne sert a avoir un id unique et te moche le nom d'image en mot de passe, 
            //pour pas avoir le meme nom sur toute les images car si ont suprime une image ont les supprime tous car il ont tous le meme nom//
            $newImg1FileName = $img1FileName.'.'.$img1File->guessExtension(); 

            try {
                $img1File->move(
                    $this->getParameter('maison_img_directory'),
                    $newImg1FileName
                ); 

            } 
            catch(FileException $e){
                $this->addFlash(
                    'danger', 
                    'Une erreur est survenu lors de l\'image'
                ); 
            }
            $maison->setImg1($newImg1FileName); 

            
            
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

        $img1Name = $maison->getImg1();
        $img1Path = $this->getParameter('maison_img_directory').'/'.$img1Name; 
        unlink($img1Path);  

        $manager =$this->getDoctrine()->getManager(); 
        $manager->remove($maison); 
        $manager->flush();

        return $this->redirectToRoute('admin_maisons'); 
    }
}