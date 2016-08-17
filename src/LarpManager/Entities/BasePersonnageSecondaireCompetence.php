<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-17 11:09:52.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\PersonnageSecondaireCompetence
 *
 * @Entity()
 * @Table(name="personnage_secondaire_competence", indexes={@Index(name="fk_personnage_secondaires_competences_personnage_secondaire_idx", columns={"personnage_secondaire_id"}), @Index(name="fk_personnage_secondaires_competences_competence1_idx", columns={"competence_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnageSecondaireCompetence", "extended":"PersonnageSecondaireCompetence"})
 */
class BasePersonnageSecondaireCompetence
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="PersonnageSecondaire", inversedBy="personnageSecondaireCompetences", cascade={"persist"})
     * @JoinColumn(name="personnage_secondaire_id", referencedColumnName="id", nullable=false)
     */
    protected $personnageSecondaire;

    /**
     * @ManyToOne(targetEntity="Competence", inversedBy="personnageSecondaireCompetences", cascade={"persist"})
     * @JoinColumn(name="competence_id", referencedColumnName="id", nullable=false)
     */
    protected $competence;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\PersonnageSecondaireCompetence
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
     * Set PersonnageSecondaire entity (many to one).
     *
     * @param \LarpManager\Entities\PersonnageSecondaire $personnageSecondaire
     * @return \LarpManager\Entities\PersonnageSecondaireCompetence
     */
    public function setPersonnageSecondaire(PersonnageSecondaire $personnageSecondaire = null)
    {
        $this->personnageSecondaire = $personnageSecondaire;

        return $this;
    }

    /**
     * Get PersonnageSecondaire entity (many to one).
     *
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function getPersonnageSecondaire()
    {
        return $this->personnageSecondaire;
    }

    /**
     * Set Competence entity (many to one).
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\PersonnageSecondaireCompetence
     */
    public function setCompetence(Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get Competence entity (many to one).
     *
     * @return \LarpManager\Entities\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    public function __sleep()
    {
        return array('id', 'personnage_secondaire_id', 'competence_id');
    }
}