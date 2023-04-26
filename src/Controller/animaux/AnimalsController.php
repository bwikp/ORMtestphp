<?php
namespace App\Controller\animaux;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalsController extends AbstractController
{
    #[Route('/animal', name: 'app_animal')]
    public function index(AnimalRepository $animalRepository): Response
    {
         $lesAnimaux = $animalRepository->findAll();
        return $this->render('animal/index.html.twig', [
            'animal' => $lesAnimaux,
        ]);
    }
}
