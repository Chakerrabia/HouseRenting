<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;


class RegistrationController extends AbstractFOSRestController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var OutputInterface
     */
    private $output;
    /**
     * @var VerifyEmailHelperInterface
     */
    private $helper;

    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, VerifyEmailHelperInterface $helper)
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
        $this->helper = $helper;
    }

    /**
     * @Route("/api/register", name="api_register", methods={"POST"})
     */
    public function index(Request $request,\Swift_Mailer $mailer)
    {
        $data = json_decode($request->getContent(), true);

        $username = $data["username"];
        $password = $data["password"];
        $type = $data["type"];
        $email = $data["email"];
        $nom = $data["nom"];
        $prenom = $data["prenom"];
        $cin = $data["cin"];

        $user = $this->userRepository->findOneBy([
            'username' => $username,
        ]);

        if (!is_null($user)) {
            return $this->json([
                'message' => 'User already exists'
            ], Response::HTTP_CONFLICT);
        }

        $user = new User();

        $user->setUsername($username);
        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $password)
        );
        $user->setVerified(false);

        if($type == "client"){

            $client = new Client();
            $client->setNom($nom);
            $client->setPrenom($prenom);
            $client->setCin($cin);
            $client->setEmail($email);
            $client->setUserInstance($user);
            $this->entityManager->persist($user);
            $this->entityManager->persist($client);
            $this->entityManager->flush();
        }
        if($type == "proprietaire"){

            $proprietaire = new Proprietaire();
            $proprietaire->setNom($nom);
            $proprietaire->setPrenom($prenom);
            $proprietaire->setCin($cin);
            $proprietaire->setEmail($email);
            $proprietaire->setUserInstance($user);
            $this->entityManager->persist($user);
            $this->entityManager->persist($proprietaire);
            $this->entityManager->flush();
        }

        // WELCOME EMAIL

        $subject ="Welcome To house renting";
        $body="Welcome to House Renting, we hope that you enjoy your stay ". $nom . " " . $prenom ;
        $message = (new \Swift_Message($subject))
            ->setFrom('HouseRenting99@gmail.com')
            ->setTo($email)
            ->setBody($body)
        ;
        $mailer->send($message);

        //VERIFICATION EMAIL
        $signatureComponents = $this->helper->generateSignature(
            "registration_confirmation_route",
            strval($user->getID()),
            $email,
            ['id' => $user->getId()]
        );
        $subject ="verify your email!";
        $verificationMessage = (new \Swift_Message($subject))
            ->setFrom('HouseRenting99@gmail.com')
            ->setTo($email)
            ->setBody($signatureComponents->getSignedUrl())
        ;

        $mailer->send($verificationMessage);

        return new JsonResponse(["success" => $user->getUsername(). " has been registered and is now pending verification!"], 200);
    }
    /**
     * @Route("/verify", name="registration_confirmation_route")
     */
   public function verifyUserEmail(Request $request, UserRepository $userRepository): Response
{

    $id = $request->get('id'); // retrieve the user id from the url

          // Verify the user id exists and is not null
           if (null === $id) {
               return new JsonResponse(["not found" =>  "ressource missing !"], 404);
      }

       $user = $userRepository->find($id);

       // Ensure the user exists in persistence
       if (null === $user) {
               return new JsonResponse(["not found" =>  "ressource missing !"], 404);
       }

        // Do not get the User's Id or Email Address from the Request object
        // TODO Write email logic
        try {
            $this->helper->validateEmailConfirmation($request->getUri(), $user->getId(), "chakerrabia9@gmail.com");
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('verify_email_error', $e->getReason());
            //return $this->redirectToRoute('app_register');
        }

        $user->setVerified();
        $this->entityManager->flush();
        $this->addFlash('success', 'Your e-mail address has been verified.');

        return new JsonResponse(["success" =>  "Account Verification Successful for ID ". $user->getID()." !"], 200);
    }
}