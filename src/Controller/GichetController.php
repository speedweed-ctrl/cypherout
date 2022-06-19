<?php

namespace App\Controller;

use App\Entity\Administration;
use App\Entity\Gichet;
use App\Entity\Worker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use Symfony\Component\Serializer\Serializer;


class GichetController extends AbstractController
{
    /**
     * @Route("/gichet", name="gichet")
     */
    public function index(): Response
    {
        return $this->render('gichet/index.html.twig', [
            'controller_name' => 'GichetController',
        ]);
    }
    /**
     * @Route("/AddGichet",name="AddGichet")
     */
    public function AddGichet(Request $request,NormalizerInterface $normalizer)
    {
        $A = new Gichet();
        $A->setCode($request->get("Code"));
        $A->setWorker(null);
        $A->setAdministration($this->getDoctrine()->getRepository(Administration::class)->find($request->get("Administration")));
        $em = $this->getDoctrine()->getManager();
        $em->persist($A);
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getallgichets", name="getallgichets")
     */
    public function getallgichets(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getRepository(Gichet::class);
        $users=$repository->findAll();
        //$User=$repository->findAll();
        $jsonContent = $normalizer->normalize($users,'json',['groups'=>'post:read']);
        //return $this->render('mobile/loginjson.html.twig',['data'=>$jsonContent]);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getGichet", name="getGichet")
     */
    public function getGichet(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Gichet::class)->find($id);
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/delGichet", name="delGichet")
     */
    public function delGichet(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Gichet::class)->find($id);
        $repository->remove($administration);
        $repository->flush();
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode("User deleted Successfully "));
    }
    /**
     * @Route("/updateGichet", name="updateGichet")
     */
    public function updateGichet(Request $request,NormalizerInterface $normalizer){
        $id=($request->get("id"));
        $A= $this->getDoctrine()->getRepository(Gichet::class)->find($id);
        $A->setCode($request->get("Code"));
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));

    }
    /**
     * @Route("/updateGichetWorker", name="updateGichetWorker")
     */
    public function updateGichetWorker(Request $request,NormalizerInterface $normalizer){
        $id=($request->get("id"));
        $idw=($request->get("worker"));
        $W=$this->getDoctrine()->getRepository(Worker::class)->find($idw);
        if (!$idw)
        {
            return new Response(json_encode("Worker Introuvable "));
        }
        $A= $this->getDoctrine()->getRepository(Gichet::class)->find($id);
        $A->setWorker($W);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));

    }
    /**
     * @Route("/removeworkerfromgichet", name="removeworkerfromgichet")
     */
    public function removeworkerfromgichet(Request $request,NormalizerInterface $normalizer){
        $id=($request->get("id"));
        $A= $this->getDoctrine()->getRepository(Gichet::class)->find($id);
        $A->setWorker(null);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));

    }
}
