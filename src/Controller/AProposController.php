<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{

    /**
     * @return Response
     * @Route("/a-propos", name="a_propos")
     */
    public function index():Response
    {
        return $this->render('pages/a_propos.html.twig', [
            'current_menu' => 'a_propos'
        ]);

    }
}