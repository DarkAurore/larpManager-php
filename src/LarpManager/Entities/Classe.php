<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-15 15:56:46.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use LarpManager\Entities\BaseClasse;

/**
 * Je définie les relations ManyToMany içi au lieu de le faire dans Mysql Workbench
 * car l'exporteur ne sait pas gérer correctement plusieurs relations ManyToMany entre 
 * les mêmes entities (c'est dommage ...)
 * 
 * LarpManager\Entities\Classe
 * 
 * @Entity(repositoryClass="LarpManager\Repository\ClasseRepository")
 */
class Classe extends BaseClasse
{
	/**
	 * @ManyToMany(targetEntity="CompetenceFamily", inversedBy="classeFavorites")
	 * @JoinTable(name="classe_competence_family_favorite",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_family_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceFamilyFavorites;
	
	/**
	 * @ManyToMany(targetEntity="CompetenceFamily", inversedBy="classeNormales")
	 * @JoinTable(name="classe_competence_family_normale",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_family_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceFamilyNormales;
	
	/**
	 * @ManyToMany(targetEntity="CompetenceFamily", inversedBy="classeCreations")
	 * @JoinTable(name="classe_competence_family_creation",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_family_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceFamilyCreations;
	
	
	public function __construct()
	{
		$this->competenceFamilyFavorites = new ArrayCollection();
		$this->competenceFamilyNormales = new ArrayCollection();
		$this->competenceFamilyCreations = new ArrayCollection();
		parent::__construct();
	}
	
	public function __toString()
	{
		return $this->getLabel();	
	}
	
	public function getLabel()
	{
		return $this->getLabelFeminin().' / '.$this->getLabelMasculin();
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceFamilyFavorite(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->addClasseFavorite($this);
		$this->competenceFamilyFavorites[] = $competenceFamily;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceFamilyFavorite(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->removeClasseFavorite($this);
		$this->$competenceFamilyFavorites->removeElement($competenceFamily);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceFamilyFavorites()
	{
		return $this->competenceFamilyFavorites;
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceFamilyNormale(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->addClasseNormale($this);
		$this->competenceFamilyNormales[] = $competenceFamily;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceFamilyNormale(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->removeClasseNormale($this);
		$this->$competenceFamilyNormales->removeElement($competenceFamily);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceFamilyNormales()
	{
		return $this->competenceFamilyNormales;
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceFamilyCreation(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->addClasseCreation($this);
		$this->competenceFamilyCreations[] = $competenceFamily;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceFamilyCreation(CompetenceFamily $competenceFamily)
	{
		$competenceFamily->removeClasseCreation($this);
		$this->$competenceFamilyCreations->removeElement($competenceFamily);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceFamilyCreations()
	{
		return $this->competenceFamilyCreations;
	}
}