<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\User;
use App\Entity\Ennemy;
use App\Entity\Persona;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;

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
    public function gameAjax(Request $request, UserInterface $userAuthenticated): JsonResponse
    {
    
        //var_dump($request->query->get('actionPlayer'));
        $actionPlayer = $request->query->get('actionPlayer');

        switch ($actionPlayer) {
            case "actionPlayerEntryDungeon":
                $user=$this->getUser();
                $em = $this->getDoctrine()->getManager(); 
                $game = $user->getGame();  
                $persona = $game->getPersona();
                $ennemy  = $game->getEnnemy();
                return new JsonResponse(
                    '[
                        {
                            "action":"showSceneFight",
                            "hpMaxPersona":'.$persona->getHpMax().',
                            "hpCurrentPersona":'.$persona->getHpCurrent().',
                            "mpMaxPersona":'.$persona->getPmMax().',
                            "mpCurrentPersona":'.$persona->getPmCurrent().',
                            "staminaMaxPersona":'.$persona->getStaminaMax().',
                            "staminaCurrentPersona":'.$persona->getStaminaCurrent().',
                            "hpCurrentEnnemy":'.$ennemy->getHpCurrent().',
                            "hpMaxEnnemy":60
                            
                        }
                    ]'
                
                );

                break;
            case "actionInitialization":
                // $user = $this->recovery_user($userAuthenticated);
               // $this->getUser()
                $user=$this->getUser();
                $em = $this->getDoctrine()->getManager(); 
                $game = $user->getGame();    

                //Si début de partie
                if($game->getFlagStartGame()){
                    $persona = new Persona();
                    $persona->initialize();
                    dump($persona);
                    $game->setPersona($persona);
                    $ennemy = new Ennemy();
                    $ennemy->initialize();
                    dump($ennemy);
                    $game->setEnnemy($ennemy);
                    $game->setFlatAtCampfire(true);
                    //Enregistrement en base
                    $em->persist($user);
                    $em->flush();
                    //Réponse serveur
                    return new JsonResponse(
                        '[
                            {
                                "action":"showFirecamp"
                            }
                        ]'
                    
                );
                }
                //Si combat engagé
                if($game->getFlagInTower()){
                    $persona = $game->getPersona();
                    $ennemy  = $game->getEnnemy();
                    //Réponse serveur
                    return new JsonResponse(
                        '[
                            {
                                "action":"showSceneFight",
                                "hpMaxPersona":$persona->getHpMax(),
                                "hpCurrentPersona":$persona->getHpCurrent(),
                                "mpMaxPersona":$persona->getPmMax(),
                                "mpCurrentPersona":$persona->getPmCurrent(),
                                "staminaMaxPersona":$persona->getStaminaMax(),
                                "staminaCurrentPersona":$persona->getStaminaCurrent(),
                                "hpMaxEnnemy":$ennemy->60,
                                "hpCurrentEnnemy":$ennemy->getHpCurrent()
                            }
                        ]'
                    );
                }
        
    

               
                break;
        }      
            
           //return new JsonResponse('This is ajax respons');
     
    }

}


/**************************************************************** */
function entryDungeon() {
    echo "La fonction marche !!!!!!!!!";
}

