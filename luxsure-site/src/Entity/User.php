<?php

/**
 * ETML
 * Auteur : David Dieperink, Stefan Petrovic, Noa Chouriberry
 * Date : 16.12.2022
 * Description : Class for the user table data
 */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?int $rights = null;

    /**
     * Function to get the id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Function to get the username
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Function to set the username
     * @param string|null $username
     * @return $this
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Function to get the password
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Function to set the password
     * @param string|null $password
     * @return $this
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Function to get the rights
     * @return int|null
     */
    public function getRights(): ?int
    {
        return $this->rights;
    }

    /**
     * Function to set the rights
     * @param int|null $rights
     * @return $this
     */
    public function setRights(?int $rights): self
    {
        $this->rights = $rights;

        return $this;
    }
}
