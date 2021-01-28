<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestoController extends AbstractController
{
    /**
     * @Route("/resto/profil", name="profil")
     */
    public function index()
    {
        return $this->render('resto/resto.html.twig');
    }
}
