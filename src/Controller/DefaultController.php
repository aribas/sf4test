<?php
namespace App\Controller;

use App\Entity\Script;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $scripts = $this->getDoctrine()
            ->getRepository(Script::class)
            ->findAllOrderedBySerialNumber();

        return $this->render('base.html.twig', [
            'scripts' => $scripts
        ]);
    }
}
