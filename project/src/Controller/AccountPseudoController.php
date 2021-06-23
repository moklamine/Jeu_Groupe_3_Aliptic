<?php

namespace App\Controller;

use App\Form\ModifyPseudoFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountPseudoController extends AbstractController
{
    private $entityManager;

    /**
     * AccountPseudoController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/modifier-mon-pseudo", name="account_pseudo")
     */
    public function index(Request $request): Response
    {
        $notification = null;

        $user = $this->getUser();
        $form = $this->createForm(ModifyPseudoFormType::class, $user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $new_pseudo = $form->get('new_pseudo')->getData();

            $new_pseudo = $form->get('new_pseudo')->getData();

            $user->setPseudo($new_pseudo);
            $this->entityManager->flush();
            $notification = "Votre pseudo a bien été modifié";
        }

        return $this->render('account/pseudo.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
