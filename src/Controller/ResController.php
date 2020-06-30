<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;

class ResController extends AbstractController
{
    /**
     * @Route("/res", name="res")
     */
    public function index()
    { $repo=$this->getDoctrine()->getRepository(Reservation::class);
        $Reservations=$repo->findAll();
        return $this->render('res/index.html.twig', [
            'controller_name' => 'ResController',
            'reservations'=>$Reservations
        ]);
    }
}
