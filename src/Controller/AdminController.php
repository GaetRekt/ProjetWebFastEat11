<?php

namespace App\Controller;

use App\Entity\Fastfood;
use App\Repository\FastfoodRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
  /**
   * @Route("/admin/panel", name="panel_admin")
   */
  public function show(FastfoodRepository $fastfoodRepository, ProductRepository $productRepository, UserRepository $userRepository): Response
  {

    $fastfoods = $fastfoodRepository->findAll();
    $products = $productRepository->findAll();
    $users = $userRepository->findAll();

    return $this->render('admin/admin.html.twig', [
      'fastfoods' => $fastfoods,
      'products'=> $products,
      'users'=> $users
    ]);
  }
}