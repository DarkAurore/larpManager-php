<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-17 11:09:49.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Classe
 *
 * @Entity()
 * @Table(name="classe")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseClasse", "extended":"Classe"})
 */
class BaseClasse
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
    protected $label_masculin;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $label_feminin;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string", length=90, nullable=true)
     */
    protected $image_m;

    /**
     * @Column(type="string", length=90, nullable=true)
     */
    protected $image_f;

    /**
     * @OneToMany(targetEntity="GroupeClasse", mappedBy="classe")
     * @JoinColumn(name="id", referencedColumnName="classe_id", nullable=false)
     */
    protected $groupeClasses;

    /**
     * @OneToMany(targetEntity="Personnage", mappedBy="classe")
     * @JoinColumn(name="id", referencedColumnName="classe_id", nullable=false)
     */
    protected $personnages;

    /**
     * @OneToMany(targetEntity="PersonnageSecondaire", mappedBy="classe")
     * @JoinColumn(name="id", referencedColumnName="classe_id", nullable=false)
     */
    protected $personnageSecondaires;

    public function __construct()
    {
        $this->groupeClasses = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->personnageSecondaires = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Classe
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
     * Set the value of label_masculin.
     *
     * @param string $label_masculin
     * @return \LarpManager\Entities\Classe
     */
    public function setLabelMasculin($label_masculin)
    {
        $this->label_masculin = $label_masculin;

        return $this;
    }

    /**
     * Get the value of label_masculin.
     *
     * @return string
     */
    public function getLabelMasculin()
    {
        return $this->label_masculin;
    }

    /**
     * Set the value of label_feminin.
     *
     * @param string $label_feminin
     * @return \LarpManager\Entities\Classe
     */
    public function setLabelFeminin($label_feminin)
    {
        $this->label_feminin = $label_feminin;

        return $this;
    }

    /**
     * Get the value of label_feminin.
     *
     * @return string
     */
    public function getLabelFeminin()
    {
        return $this->label_feminin;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Classe
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
     * Set the value of image_m.
     *
     * @param string $image_m
     * @return \LarpManager\Entities\Classe
     */
    public function setImageM($image_m)
    {
        $this->image_m = $image_m;

        return $this;
    }

    /**
     * Get the value of image_m.
     *
     * @return string
     */
    public function getImageM()
    {
        return $this->image_m;
    }

    /**
     * Set the value of image_f.
     *
     * @param string $image_f
     * @return \LarpManager\Entities\Classe
     */
    public function setImageF($image_f)
    {
        $this->image_f = $image_f;

        return $this;
    }

    /**
     * Get the value of image_f.
     *
     * @return string
     */
    public function getImageF()
    {
        return $this->image_f;
    }

    /**
     * Add GroupeClasse entity to collection (one to many).
     *
     * @param \LarpManager\Entities\GroupeClasse $groupeClasse
     * @return \LarpManager\Entities\Classe
     */
    public function addGroupeClasse(GroupeClasse $groupeClasse)
    {
        $this->groupeClasses[] = $groupeClasse;

        return $this;
    }

    /**
     * Remove GroupeClasse entity from collection (one to many).
     *
     * @param \LarpManager\Entities\GroupeClasse $groupeClasse
     * @return \LarpManager\Entities\Classe
     */
    public function removeGroupeClasse(GroupeClasse $groupeClasse)
    {
        $this->groupeClasses->removeElement($groupeClasse);

        return $this;
    }

    /**
     * Get GroupeClasse entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupeClasses()
    {
        return $this->groupeClasses;
    }

    /**
     * Add Personnage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Classe
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
     * @return \LarpManager\Entities\Classe
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
     * Add PersonnageSecondaire entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaire $personnageSecondaire
     * @return \LarpManager\Entities\Classe
     */
    public function addPersonnageSecondaire(PersonnageSecondaire $personnageSecondaire)
    {
        $this->personnageSecondaires[] = $personnageSecondaire;

        return $this;
    }

    /**
     * Remove PersonnageSecondaire entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaire $personnageSecondaire
     * @return \LarpManager\Entities\Classe
     */
    public function removePersonnageSecondaire(PersonnageSecondaire $personnageSecondaire)
    {
        $this->personnageSecondaires->removeElement($personnageSecondaire);

        return $this;
    }

    /**
     * Get PersonnageSecondaire entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageSecondaires()
    {
        return $this->personnageSecondaires;
    }

    public function __sleep()
    {
        return array('id', 'label_masculin', 'label_feminin', 'description', 'image_m', 'image_f');
    }
}