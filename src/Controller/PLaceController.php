<?php

namespace App\Controller;

use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use App\Entity\Place;
use App\Entity\Image;
use App\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/place_dispo', name: 'places_')]
class PLaceController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('p_lace/index.html.twig', [
            'controller_name' => 'PLaceController',
        ]);
    }


    #[Route('/{id}/{images}', name: 'details')]
    public function details(PlaceRepository $places,ImageRepository $image,Place $place): Response
    {
        //$images = $image->findBy([],['id' => 'asc']);
        //$places = $place->findBy([],['id' => 'asc']);

        //image 
        $tsswira = $place->getImages();
        //inforemarion sur la place 
        $empty = $place->isIsEmpty();
        $total = $place->getTotalPlace();
        $free = $place->getAvailablSpot();
        $full = $place->getFullSpot();



        return $this->render('p_lace/details.html.twig',compact('place','tsswira','empty','total','free','full')
    
    );
    }


}
