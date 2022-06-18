<?php

namespace App\Controller;

use App\Entity\Administration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use Symfony\Component\Serializer\Serializer;



class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    /**
     * @Route("/addAdministration",name="addAdministration")
     */
    public function addAdministration(Request $request,NormalizerInterface $normalizer)
    {
        $A = new Administration();
        $A->setName($request->get("Name"));
        $A->setType($request->get("Type"));
        $A->setMapCoordinates($request->get("Map"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($A);
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getalladminstrationss", name="getalladminstrationss")
     */
    public function getalladminstrationss(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getRepository(Administration::class);
        $users=$repository->findAll();
        //$User=$repository->findAll();
        $jsonContent = $normalizer->normalize($users,'json',['groups'=>'post:read']);
        //return $this->render('mobile/loginjson.html.twig',['data'=>$jsonContent]);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/deladminstration", name="deladminstration")
     */
    public function deladminstration(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Administration::class)->find($id);
        $repository->remove($administration);
        $repository->flush();
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode("User deleted Successfully "));
    }
    /**
     * @Route("/updateadminstration", name="updateadminstration")
     */
    public function updateadminstration(Request $request,NormalizerInterface $normalizer){
        $id=($request->get("id"));
        $A= $this->getDoctrine()->getRepository(Administration::class)->find($id);
        $A->setName($request->get("Name"));
        $A->setType($request->get("Type"));
        $A->setMapCoordinates($request->get("Map"));
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));

    }

}
