<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * @Route("/contactez-nous", name="contact")
     */
    public function index(Request $request): Response
    {
        $name = $request->query->get('name');


        $contact = new Contact();
        $form = $this -> createForm(ContactType::class, $contact);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('contact');
        }


        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'Contact',
            'name' => $name,
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form,
        ]);
    }

    /**
     * @Route("/contactez-nous/{id}", name="contact")
     */
    public function index2(Request $request, $id = ""): Response
    {
        $name = $request->query->get('name');


        $contact = new Contact();
        $form = $this -> createForm(ContactType::class, $contact);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('contact');
        }


        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'Contact',
            'contact' => $this->contactRepository->find($id),
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form,
        ]);
    }
}
