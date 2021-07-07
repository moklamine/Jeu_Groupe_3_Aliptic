<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/game/ajax", name="gameajax")
     */
    public function gameAjax(Request $request): JsonResponse
    {
    
        //var_dump($request->query->get('actionPlayer'));
        $actionPlayer = $request->query->get('actionPlayer');

        switch ($actionPlayer) {
            case "actionPlayerEntryDungeon":
                //echo "OOOOOOOOOOOOOOOOOOOOOOOOOOO";
                //entryDungeon();
                return new JsonResponse(
                    '[
                        {
                            "action":"showDungeon",
                            "image":"Morbol.png" 
                        }
                    ]'
                
                );
                //echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
                break;
        }      
            
           //return new JsonResponse('This is ajax respons');
     
    }
}

function entryDungeon() {
    echo "La fonction marche !!!!!!!!!";
}

