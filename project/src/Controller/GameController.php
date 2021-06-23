<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/game/combat", name="game_fight")
     */
    public function fight(): Response
    {
        $response = new JsonResponse([
            'pseudo' => "Carlos",
            'action' => [
                'magic' => 'water',
                'state' => 'acceleration',
                'defense' => 'balm'
            ]
        ]);

        // Use the JSON_PRETTY_PRINT
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );

        return $response;
    }
}
