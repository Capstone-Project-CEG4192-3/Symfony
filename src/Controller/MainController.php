<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(UsersRepository $usersrepo,PlaceRepository $place,ImageRepository $image): Response
    {
        return $this->render('main/index.html.twig', [
            
            'first_name' => $usersrepo->findBy([],['id' => 'asc']),
            'places' => $place->findBy([],['id' => 'asc']),
            'images' => $image->findBy([],['id' => 'asc'])
        ]);
    }


}
