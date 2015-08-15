<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-15 13:14:22.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseCompetence;

/**
 * LarpManager\Entities\Competence
 *
 * @Entity()
 */
class Competence extends BaseCompetence
{
	/**
	 * Permet de définir la date de création
	 */
	public function __construct()
	{
		$this->setCreationDate(new \DateTime('NOW'));
		$this->setUpdateDate(new \DateTime('NOW'));
		parent::__construct();
	}
	
	/**
	 * Helper pour récupérer l'utilisateur qui a créé la compétence
	 */
	public function getCreator()
	{
		$creator = $this->getUser();
	
		return $creator;
	}
	
	/**
	 * Helper pour définir l'utilisateur qui a créé la compétence
	 * @param User $user
	 */
	public function setCreator($user)
	{
		return $this->setUser($user);
	}
	
	/**
	 * Helper pour récupérer tous les niveaux d'une compétence
	 */
	public function getNiveaux()
	{
		return $this->getCompetenceNiveaus();
	}
}