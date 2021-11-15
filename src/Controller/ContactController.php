<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contactez-moi/{city}", name="contact")
     */
    public function index(Request $request, $city = ""): Response
    {
        $name = $request->query->get('name');

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'Contact',
            'city' => $city,
            'name' => $name
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
