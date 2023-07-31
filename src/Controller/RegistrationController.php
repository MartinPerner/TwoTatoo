<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\UserAuthenticator;
use App\Service\JWTService;
use App\Service\SendMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    
    // #[Route('/verif/{token}', name: 'verify_user')]
    // public function verifyUser($token, JWTService $jwt): Response
    // {
    //     dd($jwt->getPayload($token));
    // }

    
}


            // On génère le JWT de l'utilisteur 
            // Création du Header
            // $header = [
            //     'typ' => 'JWT',
            //     'alg' => 'HS256',
            // ];
            // Création du payload
            // $payload = [
            //     'user_id' => $user->getId()
            // ];
            // On génère le token
            // $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));

            // dd($token);

            // On envoie un mail
            // $mail->send(
            //     'no-reply@monsite.net',
            //     $user->getEmail(),
            //     'Vérificaiton de votre compte sur le site Univartana',
            //     'register',
            //     compact('user')
            //     );