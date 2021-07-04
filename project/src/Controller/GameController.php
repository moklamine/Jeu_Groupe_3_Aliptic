<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/game/combat", name="game_combat")
     */
    public function combat(): Response
    {

        $jsonData = "Attaque.<br/>L'ennemi prend 15 points de dégats ";
            return new JsonResponse($jsonData);
    }
}
