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
     * @Route("/contactez-nous/{city}", name="contact")
     */
    public function index(Request $request, $city = ""): Response
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this -> createForm(ContactType::class, $contact);


        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'Contact',
            'city' => $city,
            'name' => $name,
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form,
        ]);
    }



//    /**
//     * @Route("/contact/{city}", name="contactCity")
//     */
//    public function contactCities(string $city): Response
//    {
//        return $this->render('contact/index.html.twig', [
//            'controller_name' => 'ContactCity',
//            'city' => $city
//    ]);
//    }
}
