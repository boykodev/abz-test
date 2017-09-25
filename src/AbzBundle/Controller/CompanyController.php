<?php

namespace AbzBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{
    /**
     * Shows all employees in table with pagination
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AbzBundle:Employee')->getAllQuery();

        $paginator = $this->get('knp_paginator');
        $employees = $paginator->paginate(
            $query, $request->query->getInt('page', 1)
        );

        return $this->render('company/index.html.twig', [
            'employees' => $employees
        ]);
    }

    /**
     * Show all employees of the particular boss
     *
     * @Route("/boss/{id}", name="boss", requirements={"id": "\d+"})
     */
    public function bossAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AbzBundle:Employee')->getAllByBossQuery($id);

        $paginator = $this->get('knp_paginator');
        $employees = $paginator->paginate(
            $query, $request->query->getInt('page', 1)
        );

        return $this->render('company/index.html.twig', [
            'employees' => $employees
        ]);
    }
}
