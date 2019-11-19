<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        try {
            $number = random_int(0, 100);
        } catch (Exception $e) {
            // log the exception
        }

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);

    }
}