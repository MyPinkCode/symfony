<?php

namespace App\Controller;
use App\Form\CliFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
use App\Entity\Client;

class CliController extends AbstractController
{
    /**
     * @Route("/", name="cli")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Client::class);
        $clients=$repo->findAll();
        return $this->render('cli/index.html.twig', [
            'controller_name' => 'CliController',
            'clients'=>$clients
        ]);
    }
 /**
     * @Route("/new", name="add_client")
     */
    public function addclient(Request $request): Response
    {$client = new Client();
        $form = $this->createForm(CliFormType::class);
        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
          $client = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($client);
          $entityManager->flush();
  
          return $this->redirectToRoute('cli');
        }
        return $this->render("cli/new.html.twig", [
            "form_title" => "Ajouter un client",
            "form_client" => $form->createView(),
        ]);
    }
    /**
 * @Route("/new/{id}", name="modify")
 */
public function modifyclient(Request $request, int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();

    $client = $entityManager->getRepository(Client::class)->find($id);
    $form = $this->createForm(CliFormType::class, $client);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();
        return $this->redirectToRoute('cli');
    }

    return $this->render("cli/new.html.twig", [
        "form_title" => "Modifier un produit",
        "form_client" => $form->createView(),
    ]);
}
/**
 * @Route("/delete/{id}", name="delete_client")
 */
public function deleteclient(int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $client = $entityManager->getRepository(Client::class)->find($id);
    $entityManager->remove($client);
    $entityManager->flush();

    return $this->redirectToRoute("cli");
}
 
}
