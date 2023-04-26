<?php

namespace App\Controller\ferme;

use App\Form\FermeType;
use App\Repository\FermeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ferme;
class PouletFermierController extends AbstractController
{
    #[Route('/poulet', name: 'app_poulet_fermier')]
    public function index(Request $request,FermeRepository $fermeRepository): Response
    {   
        $poulet = new Ferme();
        $formPoulet = $this->createForm(FermeType::class, $poulet);
        $formPoulet->handleRequest($request);

        if($formPoulet->isSubmitted() && $formPoulet->isValid())
            {
                $fermeRepository->save($poulet,true);
            return $this->redirectToRoute('app_ferme', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('ferme/creation.html.twig', [
            'poulet' => $poulet,
            'form' => $formPoulet,
        ]);
    }
}
