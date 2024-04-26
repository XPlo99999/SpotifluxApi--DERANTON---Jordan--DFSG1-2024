<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TrackController extends AbstractController
{
    #[Route('/web/track', name: 'app_web_track')]
    public function index(): Response
    {
        return $this->render('web/track/index.html.twig', [
            'controller_name' => 'TrackController',
        ]);
    }
}
