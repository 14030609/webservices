<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $emp_no;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $gender;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $hire_date;

    public function getId()
    {
        return $this->id;
    }

    public function getEmpNo(): ?int
    {
        return $this->emp_no;
    }

    public function setEmpNo(int $emp_no): self
    {
        $this->emp_no = $emp_no;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeImmutable $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHireDate(): ?\DateTimeImmutable
    {
        return $this->hire_date;
    }

    public function setHireDate(\DateTimeImmutable $hire_date): self
    {
        $this->hire_date = $hire_date;

        return $this;
    }
}
