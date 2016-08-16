<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-16 12:31:55.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Lieu
 *
 * @Entity()
 * @Table(name="lieu")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseLieu", "extended":"Lieu"})
 */
class BaseLieu
{
    /**
     * @Id
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string", length=45)
     */
    protected $nom;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ManyToMany(targetEntity="Document", mappedBy="lieus")
     */
    protected $documents;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Lieu
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     * @return \LarpManager\Entities\Lieu
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Lieu
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add Document entity to collection.
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\Lieu
     */
    public function addDocument(Document $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove Document entity from collection.
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\Lieu
     */
    public function removeDocument(Document $document)
    {
        $this->documents->removeElement($document);

        return $this;
    }

    /**
     * Get Document entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'description');
    }
}