<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-12 21:48:55.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Pays
 *
 * @Entity()
 * @Table(name="pays")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePays", "extended":"Pays"})
 */
class BasePays
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $nom;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $impot;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $richesse;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $histoire;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $capitale;

    /**
     * @OneToMany(targetEntity="Chronologie", mappedBy="pays")
     * @JoinColumn(name="id", referencedColumnName="pays_id")
     */
    protected $chronologies;

    /**
     * @ManyToMany(targetEntity="Ressource", mappedBy="pays")
     */
    protected $ressources;

    /**
     * @ManyToMany(targetEntity="Langue", inversedBy="pays")
     * @JoinTable(name="pays_langue",
     *     joinColumns={@JoinColumn(name="pays_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="langue_id", referencedColumnName="id")}
     * )
     */
    protected $langues;

    /**
     * @ManyToMany(targetEntity="Region", mappedBy="pays")
     */
    protected $regions;

    public function __construct()
    {
        $this->chronologies = new ArrayCollection();
        $this->ressources = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->regions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Pays
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
     * @return \LarpManager\Entities\Pays
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
     * @return \LarpManager\Entities\Pays
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
     * Set the value of impot.
     *
     * @param integer $impot
     * @return \LarpManager\Entities\Pays
     */
    public function setImpot($impot)
    {
        $this->impot = $impot;

        return $this;
    }

    /**
     * Get the value of impot.
     *
     * @return integer
     */
    public function getImpot()
    {
        return $this->impot;
    }

    /**
     * Set the value of richesse.
     *
     * @param integer $richesse
     * @return \LarpManager\Entities\Pays
     */
    public function setRichesse($richesse)
    {
        $this->richesse = $richesse;

        return $this;
    }

    /**
     * Get the value of richesse.
     *
     * @return integer
     */
    public function getRichesse()
    {
        return $this->richesse;
    }

    /**
     * Set the value of histoire.
     *
     * @param string $histoire
     * @return \LarpManager\Entities\Pays
     */
    public function setHistoire($histoire)
    {
        $this->histoire = $histoire;

        return $this;
    }

    /**
     * Get the value of histoire.
     *
     * @return string
     */
    public function getHistoire()
    {
        return $this->histoire;
    }

    /**
     * Set the value of capitale.
     *
     * @param string $capitale
     * @return \LarpManager\Entities\Pays
     */
    public function setCapitale($capitale)
    {
        $this->capitale = $capitale;

        return $this;
    }

    /**
     * Get the value of capitale.
     *
     * @return string
     */
    public function getCapitale()
    {
        return $this->capitale;
    }

    /**
     * Add Chronologie entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Chronologie $chronologie
     * @return \LarpManager\Entities\Pays
     */
    public function addChronologie(Chronologie $chronologie)
    {
        $this->chronologies[] = $chronologie;

        return $this;
    }

    /**
     * Remove Chronologie entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Chronologie $chronologie
     * @return \LarpManager\Entities\Pays
     */
    public function removeChronologie(Chronologie $chronologie)
    {
        $this->chronologies->removeElement($chronologie);

        return $this;
    }

    /**
     * Get Chronologie entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChronologies()
    {
        return $this->chronologies;
    }

    /**
     * Add Ressource entity to collection.
     *
     * @param \LarpManager\Entities\Ressource $ressource
     * @return \LarpManager\Entities\Pays
     */
    public function addRessource(Ressource $ressource)
    {
        $this->ressources[] = $ressource;

        return $this;
    }

    /**
     * Remove Ressource entity from collection.
     *
     * @param \LarpManager\Entities\Ressource $ressource
     * @return \LarpManager\Entities\Pays
     */
    public function removeRessource(Ressource $ressource)
    {
        $this->ressources->removeElement($ressource);

        return $this;
    }

    /**
     * Get Ressource entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRessources()
    {
        return $this->ressources;
    }

    /**
     * Add Langue entity to collection.
     *
     * @param \LarpManager\Entities\Langue $langue
     * @return \LarpManager\Entities\Pays
     */
    public function addLangue(Langue $langue)
    {
        $langue->addPays($this);
        $this->langues[] = $langue;

        return $this;
    }

    /**
     * Remove Langue entity from collection.
     *
     * @param \LarpManager\Entities\Langue $langue
     * @return \LarpManager\Entities\Pays
     */
    public function removeLangue(Langue $langue)
    {
        $langue->removePays($this);
        $this->langues->removeElement($langue);

        return $this;
    }

    /**
     * Get Langue entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * Add Region entity to collection.
     *
     * @param \LarpManager\Entities\Region $region
     * @return \LarpManager\Entities\Pays
     */
    public function addRegion(Region $region)
    {
        $this->regions[] = $region;

        return $this;
    }

    /**
     * Remove Region entity from collection.
     *
     * @param \LarpManager\Entities\Region $region
     * @return \LarpManager\Entities\Pays
     */
    public function removeRegion(Region $region)
    {
        $this->regions->removeElement($region);

        return $this;
    }

    /**
     * Get Region entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegions()
    {
        return $this->regions;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'description', 'impot', 'richesse', 'histoire', 'capitale');
    }
}