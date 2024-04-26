<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/web/artist', name: 'app_web_artist')]
    public function index(): Response
    {
        return $this->render('web/artist/index.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }
}
