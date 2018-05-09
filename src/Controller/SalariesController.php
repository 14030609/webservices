<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Salaries;
use Symfony\Component\HttpFoundation\JsonResponse;

class SalariesController extends Controller
{
    /**
     * @Route("/salaries", name="salaries")
     */
    public function index()
    {
        $salaries_list =$this->getDoctrine()->getRepository(Salaries::class)->findAll();
        return $this->render('employees/index.html.twig', [
            'salaries_list' => $salaries_list,
        ]);
    }

    //va a obtener todos los registros de la tabla en un arreglo de objetos
    /**
     * @Route("/getsalaries/{id}", name="getsalaries")
     */

    public function getSalaries($id)
    {
        $salaries=$this->getDoctrine()->getRepository(Salaries::class)->findBy(array('emp_no'=>$id));
        $aSalaries=array();
        foreach ($salaries as $salarie)
        {
            $aSalaries[]=array('id'=>$salarie->getId(),
                'emp_no'=>$salarie->getEmpNo(),
                'salary'=>$salarie->getSalary(),
                'from_date'=>$salarie->getFromDate(),
                'to_date'=>$salarie->getToDate()

            );

        }
        $response = new  JsonResponse();
        $response->setData($aSalaries);
        //$response->setData(array('data'=>$aProductos));
        return $response;

    }
}