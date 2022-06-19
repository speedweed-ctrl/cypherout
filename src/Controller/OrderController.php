<?php

namespace App\Controller;

use App\Entity\Administration;
use App\Entity\Gichet;
use App\Entity\Order;
use App\Entity\Ticket;
use App\Entity\Worker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order")
     */
    public function index(): Response
    {
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }
    /**
     * @Route("/AddOrder",name="AddOrder")
     */
    public function AddOrder(Request $request, NormalizerInterface $normalizer)
    {
        $A = new Order();
        $A->setDate($request->get("date"));
        $A->setOrderDescription($request->get("Desc"));
        $A->setWorker($this->getDoctrine()->getRepository(Worker::class)->find($request->get("worker")));
        $A->setTicket($this->getDoctrine()->getRepository(Ticket::class)->find($request->get("ticket")));
        $em = $this->getDoctrine()->getManager();
        $em->persist($A);
        $em->flush();
        $jsonContent = $normalizer->normalize($A, 'json', ['groups' => 'read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getallordres", name="getallordres")
     */
    public function getallordres(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getRepository(Order::class);
        $users=$repository->findAll();
        //$User=$repository->findAll();
        $jsonContent = $normalizer->normalize($users,'json',['groups'=>'post:read']);
        //return $this->render('mobile/loginjson.html.twig',['data'=>$jsonContent]);
        return new Response(json_encode($jsonContent));
    }
}
