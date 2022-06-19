<?php

namespace App\Controller;

use App\Entity\Administration;
use App\Entity\Gichet;
use App\Entity\Order;
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
    /**
     * @Route("/getalltickets", name="getalltickets")
     */
    public function getalltickets(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getRepository(Ticket::class);
        $users=$repository->findAll();
        //$User=$repository->findAll();
        $jsonContent = $normalizer->normalize($users,'json',['groups'=>'post:read']);
        //return $this->render('mobile/loginjson.html.twig',['data'=>$jsonContent]);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/dellAllTickets", name="dellAllTickets")
     */
    public function dellAllTickets(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Administration::class)->find($id);
        $tickets=$administration->getTickets();
        $this->getDoctrine()->getManager()->remove($tickets);
        $this->getDoctrine()->getManager()->flush();
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/MakeTicketdone", name="MakeTicketdone")
     */
    public function MakeTicketdone(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $ticket=$repository->getRepository(Ticket::class)->find($id);
        $ticket->setIsDone(true);
        $this->getDoctrine()->getManager()->flush();
        $jsonContent = $normalizer->normalize($ticket,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
}
