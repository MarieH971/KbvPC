<?php

namespace App\Entity;


use App\Enum\Session;
use App\Enum\ReservationStatus;


use Datetime;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private UserInterface $user;

    #[ORM\Column(enumType: Session::class, nullable: true)]
    private ?Session $session;

    #[ORM\Column(enumType: ReservationStatus::class)]
        private ?ReservationStatus $status;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $createdAt;


   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTime
        {
            return $this->createdAt;
        }

        public function setCreatedAt(\DateTime $createdAt): void
        {
            $this->createdAt = $createdAt;
        }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of session
     */ 
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set the value of session
     *
     * @return  self
     */ 
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
}
