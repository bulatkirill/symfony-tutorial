<?php


namespace App\Controller;


use App\Entity\Printer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrinterController extends AbstractController
{

    private $printers = array();

    public function createTestPrinters()
    {
        $result = array();
        for ($i = 0; $i < 10; $i++) {
            $result[$i] = new Printer($i, 'printer' . $i, "no note yet");
        }
        return $result;
    }

    /**
     * @Route("/printers", name="printer_list")
     */
    public function index()
    {
        if (count($this->printers) === 0) {
            $this->printers = $this->createTestPrinters();
        }
        return $this->render('printer/index.html.twig', [
            'printers' => $this->printers,
        ]);
    }

    /**
     * @Route("/printers/{id}", name="printer_detail", methods={"GET", "HEAD"}, requirements={"id"="\d+"})
     * @param int $id
     * @return Response
     */
    public function detail(int $id)
    {
        $this->printers = $this->createTestPrinters();
        // is_null check
        if (!is_null($this->printers[$id])) {
            return $this->render('printer/detail.html.twig', [
                'printer' => $this->printers[$id],
            ]);
        }
        return $this->render('error.html.twig');
    }

}