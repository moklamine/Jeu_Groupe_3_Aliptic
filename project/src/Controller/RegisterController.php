<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegisterController extends AbstractController
{
    /* Initialize the doctrine variable */
    private $entityManager;

    /* Construct() function */
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="register")
     */

    /* The form listen the request */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        /* new  User() object */
        $user = new User();
        /* instantiate the form */
        $form = $this->createForm(RegisterType::class, $user);

        /* Listen to the incoming request, manipulate the request object to see if not a post inside */
        /* Use handleRequest methode */
        $form->handleRequest($request);

        /* If the form is submitted and valid? */
        if ($form->isSubmitted() && $form->isValid()) {
            /* Injects into the User () object all the data retrieved from the form */
            $user = $form->getData();

            /* Store and encode the user's password */
            $password = $encoder->encodePassword($user, $user->getPassword());

            /* Reinject the password encoded in $user */
            $user->setPassword($password);

            /* Freeze the data of the user entity */
            $this->entityManager->persist($user);
            /* Save the data in the database */
            $this->entityManager->flush();
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
