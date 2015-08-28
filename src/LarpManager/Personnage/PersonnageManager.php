<?php

namespace LarpManager\Personnage;

use Silex\Application;
use LarpManager\Entities\Personnage;
use LarpManager\Entities\CompetenceFamily;
use LarpManager\Entities\Competence;

use Doctrine\Common\Collections\ArrayCollection;

class PersonnageManager
{
	/** @var \Silex\Application */
	protected $app;
	
	public function __construct(Application $app)
	{
		$this->app = $app;
	}
	
	/**
	 * Calcul le cout d'une compétence en fonction de la classe du personnage
	 * 
	 * @param Personnage $personnage
	 * @param Competence $competence
	 */
	public function getCompetenceCout(Personnage $personnage, Competence $competence)
	{
		$classe = $personnage->getClasse();
		if ($classe->getCompetenceFamilyFavorites()->contains($competence->getCompetenceFamily()))
		{
			return $competence->getLevel()->getCoutFavori();
		}
		else if ($classe->getCompetenceFamilyNormales()->contains($competence->getCompetenceFamily()))
		{
			return $competence->getLevel()->getCout();
		}

		return $competence->getLevel()->getCoutMeconu();

	}
	
	/**
	 * Indique si un personnage connait une famille de competence
	 * 
	 * @param Personnage $personnage
	 * @param CompetenceFamily $competenceFamily
	 * @return boolean
	 */
	public function knownCompetenceFamily(Personnage $personnage, CompetenceFamily $competenceFamily)
	{
		$competences = $personnage->getCompetences();
		
		foreach ( $competences as $competence)
		{
			if ( $competence->getCompetenceFamily() == $competenceFamily)
			{
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Fourni la liste des compétences inconnues d'un personnage
	 * 
	 * @param Personnage $personnage
	 * @return Collection $competences
	 */
	public function getUnknownCompetences(Personnage $personnage)
	{
		$unknownCompetences = new ArrayCollection();
		
		$repo = $this->app['orm.em']->getRepository('\LarpManager\Entities\CompetenceFamily');
		$competenceFamilies = $repo->findAll();
				
		foreach ( $competenceFamilies as $competenceFamily)
		{
			if ( ! $this->knownCompetenceFamily($personnage, $competenceFamily))
			{
				$competence = $competenceFamily->getFirstCompetence();
				if ( $competence )
				{
					$unknownCompetences->add($competence);
				}
			}
		}
		
		return $unknownCompetences;
	}

	/**
	 * Récupére la liste des toutes les compétences accessibles pour un personnage
	 * 
	 * @param Personnage $personnage
	 * @return Collection $competenceNiveaux
	 */
	public function getAvailableCompetences(Personnage $personnage)
	{
		$availableCompetences = new ArrayCollection();
		
		// les compétences de niveau supérieur sont disponibles
		$competences = $personnage->getCompetences();
		foreach ( $competences as $competence )
		{
			$nextCompetence = $competence->getNext();
			if ( $nextCompetence &&  ! $personnage->getCompetences()->contains($nextCompetence) )
			{
				$availableCompetences->add($nextCompetence);
			}
		}
		
		// les compétences inconnue du personnage sont disponible au niveau 1
		$competences = $this->getUnknownCompetences($personnage);
		
		foreach ($competences as $competence )
		{
			$availableCompetences->add($competence);		
		}
		
		return $availableCompetences;
	}
	
}