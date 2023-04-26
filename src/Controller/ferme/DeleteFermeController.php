<?php

namespace App\Controller\ferme;

use App\Entity\Ferme;
use App\Repository\FermeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteFermeController extends AbstractController
{
    #[Route('/delete/{id}', name: 'app_delete_ferme')]
    public function index(Request $request, Ferme $ferme, FermeRepository $fermeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $ferme->getId(), $request->request->
        get('_token'))) {
            $fermeRepository->remove($ferme, true);
        return $this->redirectToRoute('app_ferme', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ferme/_delete.html.twig', [
            'ferme' => $ferme
        ]);
    }
}