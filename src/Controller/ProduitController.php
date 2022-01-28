<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    /**
     * @Route("/produit/add", name="produitAdd")
     */
    public function store(): Response
    {
        $produit = new Produit();
        $entityManager = $this->getDoctrine()->getManager();
        $produit->setNom('produit1');
        $produit->setPrix(10);
        $produit->setDescription('description1');
        $entityManager->persist($produit);
        $entityManager->flush();
        return new Response('produit ajouté');
    }

    /**
     * @Route("/produit/list", name="produitList")
     */
    public function list(ProduitRepository $repo)
    {
        $list = $repo->findAll();
        return $this->render('produit/list.html.twig', [
            'products' => $list,
        ]);
    }

    /**
     * @Route("/produit/ajout", name="produitAjout")
     */
    public function Ajout(Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $produit = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();
            return $this->redirectToRoute('produitList');
        }
        return $this->render('produit/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/produit/edit/{id}", name="produitEdit")
     */
    public function update($id, Request $request)
    {
        $produit = new Produit();
        $produit = $this->getDoctrine()->getRepository(Produit::class)->find($id);
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $produit = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();
            return $this->redirectToRoute('produitList');
        }
        return $this->render('produit/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
