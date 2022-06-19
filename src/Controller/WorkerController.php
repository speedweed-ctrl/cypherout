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
class WorkerController extends AbstractController
{
    /**
     * @Route("/worker", name="worker")
     */
    public function index(): Response
    {
        return $this->render('worker/index.html.twig', [
            'controller_name' => 'WorkerController',
        ]);
    }

    /**
     * @Route("/AddWorker",name="AddWorker")
     */
    public function AddWorker(Request $request, NormalizerInterface $normalizer)
    {
        $A = new Worker();
        $A->setCIN($request->get("Cin"));
        $A->setFirstName($request->get("First_Name"));
        $A->setLastName($request->get("Last_Name"));
        $A->setAdministration($this->getDoctrine()->getRepository(Administration::class)->find($request->get("Administration")));
        $em = $this->getDoctrine()->getManager();
        $em->persist($A);
        $em->flush();
        $jsonContent = $normalizer->normalize($A, 'json', ['groups' => 'read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getallWorkers", name="getallWorkers")
     */
    public function getallWorkers(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getRepository(Worker::class);
        $users=$repository->findAll();
        //$User=$repository->findAll();
        $jsonContent = $normalizer->normalize($users,'json',['groups'=>'post:read']);
        //return $this->render('mobile/loginjson.html.twig',['data'=>$jsonContent]);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/getWorker", name="getWorker")
     */
    public function getWorker(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Worker::class)->find($id);
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
    /**
     * @Route("/delWorker", name="delWorker")
     */
    public function delWorker(Request $request,NormalizerInterface $normalizer):Response
    {
        $repository=$this->getDoctrine()->getManager();
        $id=$request->get("id");
        $administration=$repository->getRepository(Worker::class)->find($id);
        $repository->remove($administration);
        $repository->flush();
        $jsonContent = $normalizer->normalize($administration,'json',['groups'=>'post:read']);
        return new Response(json_encode("User deleted Successfully "));
    }
    /**
     * @Route("/updateWorker", name="updateWorker")
     */
    public function updateWorker(Request $request,NormalizerInterface $normalizer){
        $id=($request->get("id"));
        $A= $this->getDoctrine()->getRepository(Worker::class)->find($id);
        $A->setCIN($request->get("Cin"));
        $A->setFirstName($request->get("First_Name"));
        $A->setLastName($request->get("Last_Name"));
        $A->setAdministration($this->getDoctrine()->getRepository(Administration::class)->find($request->get("Administration")));
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $jsonContent = $normalizer->normalize($A,'json',['groups'=>'post:read']);

        return new Response(json_encode($jsonContent));

    }

}
