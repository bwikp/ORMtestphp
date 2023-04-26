<?php

namespace App\Controller\animaux;

use App\Form\AnimalType;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Animal;
class NewAnimalController extends AbstractController
{
    #[Route('/new', name: 'app_newAnimal')]
    public function index(Request $request,AnimalRepository $animalRepository): Response
    {   
        $newAnimal = new Animal();
        $formNew = $this->createForm(AnimalType::class, $newAnimal);
        $formNew->handleRequest($request);

        if($formNew->isSubmitted() && $formNew->isValid())
            {
                $animalRepository->save($newAnimal,true);
            return $this->redirectToRoute('app_animal', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('animal/creation.html.twig', [
            'newAnimal' => $newAnimal,
            'formNew' => $formNew,
        ]);
    }
}
