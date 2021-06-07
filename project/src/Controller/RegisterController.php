<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index(): Response
    {
        /* new  User() object */
        $user = new User();
        /* instantiate the form */
        $form = $this->createForm(RegisterType::class, $user);

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
