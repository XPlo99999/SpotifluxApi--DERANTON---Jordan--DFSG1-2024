<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlbumController extends AbstractController
{
    #[Route('/web/album', name: 'app_web_album')]
    public function index(): Response
    {
        return $this->render('web/album/index.html.twig', [
            'controller_name' => 'AlbumController',
        ]);
    }
}
