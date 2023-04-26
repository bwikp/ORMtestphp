<?php

namespace App\Controller\ferme;

use App\Form\FermeType;
use App\Repository\FermeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ferme;
class UpdateController extends AbstractController
{
    #[Route('/update/{id}', name: 'app_update',methods:['GET','POST'])]
    public function index(Request $request, Ferme $ferme,FermeRepository $fermeRepository ): Response
    {
        $form = $this->createForm(FermeType::class, $ferme);
        $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            { $fermeRepository->save($ferme, true);
        return $this->redirectToRoute('app_ferme', [], Response::HTTP_SEE_OTHER);
            }
            
        return $this->render('ferme/update.html.twig', [
            'ferme' => $ferme,
            'form' => $form
        ]);
    }
}
