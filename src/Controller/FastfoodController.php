<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Fastfood;
use App\Repository\FastfoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FastfoodFormType;
use Doctrine\ORM\EntityManagerInterface;

class FastfoodController extends AbstractController
{
  /**
   * @Route("/fastfoods", name="fastfoods_list")
   */
  public function fastfoods(FastfoodRepository $fastfoodRepository): Response
  {
    return $this->render('fastfood/fastfoods.html.twig', [
      'fastfoods' => $fastfoodRepository->findAll()
    ]);
  }

 /**
   * @Route("/resto/add-fastfood", name="add_fastfood")
   */
  public function addFastfood(Request $request, EntityManagerInterface $manager)
{
  $fastfood = new Fastfood();
  $form = $this->createForm(FastfoodFormType::class, $fastfood);
  $form->handleRequest($request);
  if($form->isSubmitted() && $form->isValid()){
      $manager->persist($fastfood);
      $manager->flush();

      return $this->redirectToRoute('index');
  }

  return $this->render("fastfood/fastfood-form.html.twig", [
      'form' => $form->createView(),
  ]);
}

  /**
 * @Route("/resto/modify-fastfood/{id}", name="modify_fastfood")
 */
public function modifyFastfood(Request $request, int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();

    $fastfood = $entityManager->getRepository(Fastfood::class)->find($id);
    $form = $this->createForm(FastfoodFormType::class, $fastfood);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();

        return $this->redirectToRoute("index");
    }

    return $this->render("fastfood/fastfood-form-modify.html.twig", [
        'form' => $form->createView(),
    ]);

}

/**
 * @Route("/admin/delete-fastfood/{id}", name="delete_fastfood")
 */
public function deleteFastfood(int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $fastfood = $entityManager->getRepository(Fastfood::class)->find($id);
    $entityManager->remove($fastfood);
    $entityManager->flush();

    return $this->redirectToRoute("panel_admin");
}


  /**
   * @Route("/fastfood/{id}", name="fastfood_item")
   */
  public function fastfood(Fastfood $fastfood, Product $product): Response
  { 
    //$product = $repo->findBy($fastfood);
    return $this->render('fastfood/fastfood.html.twig', [
      'fastfood' => $fastfood,
      'product' => $product
    ]);
  }
}
