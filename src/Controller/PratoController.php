<?php

namespace App\Controller;

use App\Entity\Prato;
use App\Form\PratoType;
use App\Repository\PratoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prato")
 */
class PratoController extends AbstractController
{

    public function __construct(PratoRepository $pratoRepository)
    {
        $this->pratoRepository = $pratoRepository;
    }

    /**
     * @Route("/", name="prato_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('prato/index.html.twig', [
            'pratos' => $this->pratoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="prato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $prato = new Prato();
        $form = $this->createForm(PratoType::class, $prato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prato);
            $entityManager->flush();

            return $this->redirectToRoute('prato_index');
        }

        return $this->render('prato/new.html.twig', [
            'prato' => $prato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inicio",  methods={"GET"})
     */
    public function inicio(): Response
    {
        
        return $this->render('prato/inicio.html.twig', [
            'pratos' => $this->pratoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/show", name="prato_show",  methods={"GET"})
     */
    public function show(): Response
    {        
        return $this->render('prato/show.html.twig', [
            
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Prato $prato): Response
    {
        $form = $this->createForm(PratoType::class, $prato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prato_index');
        }

        return $this->render('prato/edit.html.twig', [
            'prato' => $prato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Prato $prato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prato_index');
    }
}
