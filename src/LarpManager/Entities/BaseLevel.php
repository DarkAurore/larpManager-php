<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-07-03 10:24:40.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Level
 *
 * @Entity()
 * @Table(name="`level`")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseLevel", "extended":"Level"})
 */
class BaseLevel
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`index`", type="integer")
     */
    protected $index;

    /**
     * @Column(type="string", length=45)
     */
    protected $label;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $cout;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $cout_favori;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $cout_meconu;

    /**
     * @OneToMany(targetEntity="Competence", mappedBy="level", cascade={"persist"})
     * @JoinColumn(name="id", referencedColumnName="level_id", nullable=false)
     */
    protected $competences;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Level
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
     * Set the value of index.
     *
     * @param integer $index
     * @return \LarpManager\Entities\Level
     */
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Get the value of index.
     *
     * @return integer
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Level
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
     * Set the value of cout.
     *
     * @param integer $cout
     * @return \LarpManager\Entities\Level
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get the value of cout.
     *
     * @return integer
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set the value of cout_favori.
     *
     * @param integer $cout_favori
     * @return \LarpManager\Entities\Level
     */
    public function setCoutFavori($cout_favori)
    {
        $this->cout_favori = $cout_favori;

        return $this;
    }

    /**
     * Get the value of cout_favori.
     *
     * @return integer
     */
    public function getCoutFavori()
    {
        return $this->cout_favori;
    }

    /**
     * Set the value of cout_meconu.
     *
     * @param integer $cout_meconu
     * @return \LarpManager\Entities\Level
     */
    public function setCoutMeconu($cout_meconu)
    {
        $this->cout_meconu = $cout_meconu;

        return $this;
    }

    /**
     * Get the value of cout_meconu.
     *
     * @return integer
     */
    public function getCoutMeconu()
    {
        return $this->cout_meconu;
    }

    /**
     * Add Competence entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\Level
     */
    public function addCompetence(Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }

    /**
     * Remove Competence entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\Level
     */
    public function removeCompetence(Competence $competence)
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    /**
     * Get Competence entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    public function __sleep()
    {
        return array('id', 'index', 'label', 'cout', 'cout_favori', 'cout_meconu');
    }
}