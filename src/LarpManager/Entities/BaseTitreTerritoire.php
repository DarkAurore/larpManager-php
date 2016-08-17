<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-17 11:09:53.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\TitreTerritoire
 *
 * @Entity()
 * @Table(name="titre_territoire", indexes={@Index(name="fk_titre_territoire_titre1_idx", columns={"titre_id"}), @Index(name="fk_titre_territoire_territoire1_idx", columns={"territoire_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseTitreTerritoire", "extended":"TitreTerritoire"})
 */
class BaseTitreTerritoire
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45)
     */
    protected $label;

    /**
     * @ManyToOne(targetEntity="Titre", inversedBy="titreTerritoires")
     * @JoinColumn(name="titre_id", referencedColumnName="id", nullable=false)
     */
    protected $titre;

    /**
     * @ManyToOne(targetEntity="Territoire", inversedBy="titreTerritoires")
     * @JoinColumn(name="territoire_id", referencedColumnName="id", nullable=false)
     */
    protected $territoire;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\TitreTerritoire
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
     * @return \LarpManager\Entities\TitreTerritoire
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
     * Set Titre entity (many to one).
     *
     * @param \LarpManager\Entities\Titre $titre
     * @return \LarpManager\Entities\TitreTerritoire
     */
    public function setTitre(Titre $titre = null)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get Titre entity (many to one).
     *
     * @return \LarpManager\Entities\Titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set Territoire entity (many to one).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\TitreTerritoire
     */
    public function setTerritoire(Territoire $territoire = null)
    {
        $this->territoire = $territoire;

        return $this;
    }

    /**
     * Get Territoire entity (many to one).
     *
     * @return \LarpManager\Entities\Territoire
     */
    public function getTerritoire()
    {
        return $this->territoire;
    }

    public function __sleep()
    {
        return array('id', 'label', 'titre_id', 'territoire_id');
    }
}