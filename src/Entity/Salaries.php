<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalariesRepository")
 */
class Salaries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employees", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $emp_no;

    /**
     * @ORM\Column(type="decimal", precision=2)
     */
    private $salary;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $from_date;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $to_date;

    public function getId()
    {
        return $this->id;
    }

    public function getEmpNo(): ?Employees
    {
        return $this->emp_no;
    }

    public function setEmpNo(Employees $emp_no): self
    {
        $this->emp_no = $emp_no;

        return $this;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getFromDate(): ?\DateTimeImmutable
    {
        return $this->from_date;
    }

    public function setFromDate(\DateTimeImmutable $from_date): self
    {
        $this->from_date = $from_date;

        return $this;
    }

    public function getToDate(): ?\DateTimeImmutable
    {
        return $this->to_date;
    }

    public function setToDate(\DateTimeImmutable $to_date): self
    {
        $this->to_date = $to_date;

        return $this;
    }
}
