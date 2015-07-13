<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-12 21:48:54.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Archetype
 *
 * @Entity()
 * @Table(name="archetype")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseArchetype", "extended":"Archetype"})
 */
class BaseArchetype
{
    /**
     * @Id
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $label;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $image;

    /**
     * @OneToMany(targetEntity="Personnage", mappedBy="archetype")
     * @JoinColumn(name="id", referencedColumnName="archetype_id")
     */
    protected $personnages;

    /**
     * @ManyToMany(targetEntity="Groupe", mappedBy="archetypes")
     */
    protected $groupes;

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Archetype
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
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Archetype
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Archetype
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
     * Set the value of image.
     *
     * @param string $image
     * @return \LarpManager\Entities\Archetype
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add Personnage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Archetype
     */
    public function addPersonnage(Personnage $personnage)
    {
        $this->personnages[] = $personnage;

        return $this;
    }

    /**
     * Remove Personnage entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Archetype
     */
    public function removePersonnage(Personnage $personnage)
    {
        $this->personnages->removeElement($personnage);

        return $this;
    }

    /**
     * Get Personnage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    /**
     * Add Groupe entity to collection.
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Archetype
     */
    public function addGroupe(Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove Groupe entity from collection.
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Archetype
     */
    public function removeGroupe(Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);

        return $this;
    }

    /**
     * Get Groupe entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    public function __sleep()
    {
        return array('id', 'label', 'description', 'image');
    }
}