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
    public function main(EntityManagerInterface $em, Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactMeType::class);

        $form->handleRequest($request);

        /** @var ContactMe $contactMe */
        $contactMe = $form->getData();

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($contactMe);
            $em->flush();

            $this->addFlash('success', 'Your message has been sent.');


            $message = (new \Swift_Message('Message from Contact Me of dgon.eu '))
                ->setFrom($contactMe->getEmail())
                ->setTo('lunaman1@naver.com')
                ->setBody(
                    $this->renderView(
                        'mail/index.html.twig',
                        ['contactMe' => $contactMe]
                    )
                )
            ;
            $mailer->send($message);


            return $this->redirectToRoute('main',[
                '_fragment' => 'contact'
            ]);

        }

        $ContactMePreData = $contactMe instanceof ContactMe ? $contactMe : new ContactMe();

        return $this->render('main/index.html.twig', [
            'contactMeForm' => $form->createView(),
            'ContactMePreData' => $ContactMePreData
        ]);
    }


}
