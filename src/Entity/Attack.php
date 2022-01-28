<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


class Attack{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
	 * @Assert\Type( 
	 *  type="integer",
	 *  message="The comment ID is not a valid type. Please refresh and try again."
	 * )
     */
    private $id;

    
}