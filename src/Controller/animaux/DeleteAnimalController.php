<?php

namespace App\Controller\animaux;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAnimalController extends AbstractController
{
    #[Route('/deleteAnimal/{id}', name: 'app_delete_Animal')]
    public function index(Request $request, Animal $animal, AnimalRepository $animalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $animal->getId(), $request->request->get('_token'))) {
            $animalRepository->remove($animal, true);
        return $this->redirectToRoute('app_animal', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Animal/_delete.html.twig', [
            'animal' => $animal
        ]);
    }
}