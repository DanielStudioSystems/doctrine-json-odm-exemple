<?php

namespace App\Controller;

use App\Entity\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $bar = new \stdClass();
        $bar->title = 'Bar';
        $bar->weight = 12;

        $baz = new \stdClass();
        $baz->name = 'Baz';
        $baz->size = 7;

        $foo = new Foo();
        $foo->setName("toto");
        $foo->misc = [$bar,$baz];
//        $foo->misc = ["yoyo","yaya"];
        $em->persist($foo);
        $em->flush();

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
