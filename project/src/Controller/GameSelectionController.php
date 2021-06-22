<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use function PHPUnit\Framework\isNull;


class GameSelectionController extends AbstractController
{
    /**
     * @Route("/gameselection", name="gameselection")
     */
    public function gameselection(UserInterface $userAuthenticated): Response
    {
        $user = $this->recovery_user($userAuthenticated);
        
        dump($user);

        if(null !==($user->getGame())){
            $selection = 1;
        }
        else{
            $selection = 2;
        }

        return $this->render('gameSelection/gameSelection.html.twig', [
            'selection' => $selection,
        ]);     
        
    }

    /**
     * @Route("/newgame", name="newgame")
     */
    public function newgame(UserInterface $userAuthenticated): Response
    {
        $user = $this->recovery_user($userAuthenticated);

        $em = $this->getDoctrine()->getManager();

        //S'il y a une partie en cours => Suppression de la partie
        if(null !==($user->getGame())){
            $em->remove($user->getGame());
            $em->flush();
        }

        //Création de la partie
        $game = new Game();
        $game->initialize();
        $game->setFlagStartGame(true);
        $game->setUser($user);
        $user->setGame($game);
        
        //Enregistrement en base
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->redirectToRoute('game');
        
    }

    //Récupère l'utilisateur et si elle existe la partie 
    private function recovery_user($userAuthenticated)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $listeUser = $repository->findby(['email' => $userAuthenticated->getUsername()]);
        $user = $listeUser[0];
        return $user;   
    }
}
