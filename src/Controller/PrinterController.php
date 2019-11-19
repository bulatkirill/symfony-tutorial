<?php


namespace App\Controller;


use App\Entity\Printer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrinterController extends AbstractController
{

    private $printers = array();

    public function createTestPrinters()
    {
        $result = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($result, new Printer($i, 'printer' . $i, "no note yet"));
        }
        return $result;
    }

    /**
     * @Route("/printers", name="printer_list")
     */
    public function printers()
    {
        if (count($this->printers) === 0) {
            $this->printers = $this->createTestPrinters();
        }
        return $this->render('printers.html.twig', [
            'printers' => $this->printers,
        ]);
    }

}