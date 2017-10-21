<?php

namespace App\Controller;

use App\Entity\Script;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/script")
 * @Security("is_granted('ROLE_USER')")
 */
class ScriptController extends Controller
{
    /**
     * @Route("/list", name="script_list")
     */
    public function indexAction(Request $request)
    {
        $scripts = $this->getDoctrine()
            ->getRepository(Script::class)
            ->findAllOrderedBySerialNumber();

        return $this->render('script/list.html.twig', [
            'scripts' => $scripts
        ]);
    }

}