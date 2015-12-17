<?php

namespace Runator\FacebookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="like")
 */
class Like
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateTime;

    /**
     * @ORM\Column(type="integer")
     */
    protected $idUser;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $idPost;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $idComment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $idAd;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPost
     *
     * @param integer $idPost
     *
     * @return Like
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set idComment
     *
     * @param integer $idComment
     *
     * @return Like
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;

        return $this;
    }

    /**
     * Get idComment
     *
     * @return integer
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * Set idAd
     *
     * @param integer $idAd
     *
     * @return Like
     */
    public function setIdAd($idAd)
    {
        $this->idAd = $idAd;

        return $this;
    }

    /**
     * Get idAd
     *
     * @return integer
     */
    public function getIdAd()
    {
        return $this->idAd;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Like
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Like
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
