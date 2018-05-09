<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Employees;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployeesController extends Controller
{
    /**
     * @Route("/employees", name="employees")
     */
    public function index()
    {
        $employees_list =$this->getDoctrine()->getRepository(Employees::class)->findAll();
        return $this->render('employees/index.html.twig', [
            'employees_list' => $employees_list,
        ]);
    }

    //va a obtener todos los registros de la tabla en un arreglo de objetos
    /**
     * @Route("/getemployees", name="getemployees")
     */

    public function getEmployees()
    {
        $employees=$this->getDoctrine()->getRepository(Employees::class)->findAll();
        $aEmployees=array();
        foreach ($employees as $employee)
        {
            $aEmployees[]=array('id'=>$employee->getId(),
                'emp_no'=>$employee->getEmpNo(),
                'first_name'=>$employee->getFirstName(),
                'last_name'=>$employee->getLastName()

            );

        }
        $response = new  JsonResponse();
        $response->setData($aEmployees);
        //$response->setData(array('data'=>$aProductos));
        return $response;

    }
}