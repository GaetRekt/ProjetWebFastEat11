<?php

namespace App\Controller;

use App\Entity\Fastfood;
use App\Repository\FastfoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
  /**
   * @Route("/", name="index")
   */
  public function index(FastfoodRepository $fastfoodRepository): Response
  {
    $fastfoods = $fastfoodRepository->findAll(Fastfood::PAGE_NB_ITEMS);

    return $this->render('index/index.html.twig', [
      'fastfoods' => $fastfoods
    ]);
  }
}
