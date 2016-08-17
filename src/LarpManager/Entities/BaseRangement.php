<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-17 11:09:52.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Rangement
 *
 * @Entity()
 * @Table(name="rangement", indexes={@Index(name="fk_rangement_localisation1_idx", columns={"localisation_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseRangement", "extended":"Rangement"})
 */
class BaseRangement
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $label;

    /**
     * @Column(name="`precision`", type="string", length=450, nullable=true)
     */
    protected $precision;

    /**
     * @OneToMany(targetEntity="Objet", mappedBy="rangement")
     * @JoinColumn(name="id", referencedColumnName="rangement_id", nullable=false)
     */
    protected $objets;

    /**
     * @ManyToOne(targetEntity="Localisation", inversedBy="rangements")
     * @JoinColumn(name="localisation_id", referencedColumnName="id")
     */
    protected $localisation;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Rangement
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
     * @return \LarpManager\Entities\Rangement
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
     * Set the value of precision.
     *
     * @param string $precision
     * @return \LarpManager\Entities\Rangement
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Get the value of precision.
     *
     * @return string
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Add Objet entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Rangement
     */
    public function addObjet(Objet $objet)
    {
        $this->objets[] = $objet;

        return $this;
    }

    /**
     * Remove Objet entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\Rangement
     */
    public function removeObjet(Objet $objet)
    {
        $this->objets->removeElement($objet);

        return $this;
    }

    /**
     * Get Objet entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjets()
    {
        return $this->objets;
    }

    /**
     * Set Localisation entity (many to one).
     *
     * @param \LarpManager\Entities\Localisation $localisation
     * @return \LarpManager\Entities\Rangement
     */
    public function setLocalisation(Localisation $localisation = null)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get Localisation entity (many to one).
     *
     * @return \LarpManager\Entities\Localisation
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function __sleep()
    {
        return array('id', 'localisation_id', 'label', 'precision');
    }
}