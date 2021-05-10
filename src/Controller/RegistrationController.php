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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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

    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
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


        $subject ="Welcome To house renting";
        $body="Welcome to House Renting, we hope that you enjoy your stay ". $nom . " " . $prenom ;
        $message = (new \Swift_Message($subject))
            ->setFrom('HouseRenting99@gmail.com')
            ->setTo($email)
            ->setBody($body)
        ;
        $mailer->send($message);

        return new JsonResponse(["success" => $user->getUsername(). " has been registered!"], 200);
    }
}