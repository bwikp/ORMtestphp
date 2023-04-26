<?php

namespace App\Controller\animaux;

use App\Form\AnimalType;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Animal;
class UpdateAnimalController extends AbstractController
{
    #[Route('/updateAnimal/{id}', name: 'app_Animalupdate',methods:['GET','POST'])]
    public function index(Request $request, Animal $animal,AnimalRepository $animalRepository ): Response
    {
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            { $animalRepository->save($animal, true);
        return $this->redirectToRoute('app_animal', [], Response::HTTP_SEE_OTHER);
            }
            
        return $this->render('animal/update.html.twig', [
            'animal' => $animal,
            'formNew' => $form
        ]);
    }
}
