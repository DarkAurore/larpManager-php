<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-11 13:24:55.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Groupe
 *
 * @Entity()
 * @Table(name="groupe")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseGroupe", "extended":"Groupe"})
 */
class BaseGroupe
{
    /**
     * @Id
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $nom;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string", length=10, nullable=true)
     */
    protected $code;

    /**
     * @OneToMany(targetEntity="Personnage", mappedBy="groupe")
     * @JoinColumn(name="id", referencedColumnName="groupe_id")
     */
    protected $personnages;

    /**
     * @OneToMany(targetEntity="Region", mappedBy="groupe")
     * @JoinColumn(name="id", referencedColumnName="groupe_id")
     */
    protected $regions;

    /**
     * @ManyToMany(targetEntity="Archetype", inversedBy="groupes")
     * @JoinTable(name="groupe_archetype",
     *     joinColumns={@JoinColumn(name="groupe_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="archetype_id", referencedColumnName="id")}
     * )
     */
    protected $archetypes;

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->archetypes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Groupe
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
     * @return \LarpManager\Entities\Groupe
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
     * @return \LarpManager\Entities\Groupe
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
     * Set the value of code.
     *
     * @param string $code
     * @return \LarpManager\Entities\Groupe
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add Personnage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Groupe
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
     * @return \LarpManager\Entities\Groupe
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
     * Add Region entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Region $region
     * @return \LarpManager\Entities\Groupe
     */
    public function addRegion(Region $region)
    {
        $this->regions[] = $region;

        return $this;
    }

    /**
     * Remove Region entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Region $region
     * @return \LarpManager\Entities\Groupe
     */
    public function removeRegion(Region $region)
    {
        $this->regions->removeElement($region);

        return $this;
    }

    /**
     * Get Region entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * Add Archetype entity to collection.
     *
     * @param \LarpManager\Entities\Archetype $archetype
     * @return \LarpManager\Entities\Groupe
     */
    public function addArchetype(Archetype $archetype)
    {
        $archetype->addGroupe($this);
        $this->archetypes[] = $archetype;

        return $this;
    }

    /**
     * Remove Archetype entity from collection.
     *
     * @param \LarpManager\Entities\Archetype $archetype
     * @return \LarpManager\Entities\Groupe
     */
    public function removeArchetype(Archetype $archetype)
    {
        $archetype->removeGroupe($this);
        $this->archetypes->removeElement($archetype);

        return $this;
    }

    /**
     * Get Archetype entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchetypes()
    {
        return $this->archetypes;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'description', 'code');
    }
}