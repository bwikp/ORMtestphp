<?php

namespace App\Controller\ferme;

use App\Repository\FermeRepository;
use App\Entity\Ferme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FermeController extends AbstractController
{
    #[Route('/', name: 'app_ferme')]
    public function index(FermeRepository $fermeRepository): Response
    {
         $lesFermes = $fermeRepository->findAll();
        return $this->render('ferme/index.html.twig', [
            'fermes' => $lesFermes,
        ]);
    }
}
