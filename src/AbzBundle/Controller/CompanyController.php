<?php

namespace AbzBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository('AbzBundle:Employee')->findAll();

        return $this->render('company/index.html.twig', [
            'employees' => $employees
        ]);
    }

    /**
     * Show all employees of the particular boss
     *
     * @Route("/boss/{id}", name="boss", requirements={"id": "\d+"})
     */
    public function bossAction($id) {
        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository('AbzBundle:Employee')
            ->findBy(['boss_id' => $id]);

        return $this->render('company/index.html.twig', [
            'employees' => $employees
        ]);
    }
}
