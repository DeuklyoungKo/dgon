<?php

namespace App\Controller;

use App\Entity\ContactMe;
use App\Form\ContactMeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function main(EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(ContactMeType::class);
        $contactMe = new ContactMe();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            /** @var ContactMe $article */
            $contactMe = $form->getData();

            $em->persist($contactMe);
            $em->flush();

            $this->addFlash('success', 'Your message has been sent.');

        }


        return $this->render('main/index.html.twig', [
            'contactMeForm' => $form->createView(),
            'ContactMePreData' => $contactMe
        ]);
    }
}
