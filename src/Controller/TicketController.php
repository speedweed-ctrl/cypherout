<?php

namespace App\Controller;

use App\Entity\Administration;
use App\Entity\Gichet;
use App\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TicketController extends AbstractController
{
    /**
     * @Route("/ticket", name="ticket")
     */
    public function index(): Response
    {
        return $this->render('ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
    /**
     * @Route("/AddTicket",name="AddTicket")
     */
    public function AddTicket(Request $request,NormalizerInterface $normalizer)
    {
        $A = new Ticket();
        $A->setIsDone(false);
        $A->setDay($request->get("date"));
        $A->setCIN($request->get("CIN"));
        $A->setAdministration($this->getDoctrine()->getRepository(Administration::class)->find($request->get("Administration")));
        $em = $this->getDoctrine()->getManager();
        $em->persist($A);
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'read']);
        return new Response(json_encode($jsonContent));
    }
}
