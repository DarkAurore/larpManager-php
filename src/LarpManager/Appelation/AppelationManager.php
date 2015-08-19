<?php

namespace LarpManager\Appelation;

use Silex\Application;
use LarpManager\Entities\Appelation;

class AppelationManager
{
	/** @var \Silex\Application */
	protected $app;
	
	public function __construct(Application $app)
	{
		$this->app = $app;
	}
	
	/**
	 * Fourni la liste des appelations n'étant pas dépendant d'une autre appelation
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function findRoot()
	{
		$query = $this->app['orm.em']->createQuery('SELECT a FROM LarpManager\Entities\Appelation a WHERE a.appelation IS NULL');
		$appelations = $query->getResult();
		
		return $appelations;	
	}
	
	/**
	 * Fourni la liste de toutes les appelations
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function findAll()
	{
		$query = $this->app['orm.em']->createQuery('SELECT a FROM LarpManager\Entities\Appelation a');
		$appelations = $query->getResult();
	
		return $appelations;
	
	}
	
	/**
	 * Trouve une appelation en fonction de son id
	 * 
	 * @param integer $id
	 * @return \LarpManager\Entities\Appelation
	 */
	public function find($id)
	{		
		$appelation = $this->app['orm.em']->find('\LarpManager\Entities\Appelation',$id);
		return $appelation;
	}
	
	/**
	 * Ajoute une nouvelle appelation dans la base de données
	 * @param Appelation $appelation
	 */
	public function insert(Appelation $appelation)
	{
		$this->app['orm.em']->persist($appelation);
		$this->app['orm.em']->flush();
	}
	
	/**
	 * Met à jour une appelation dans la base de données
	 * 
	 * @param Appelation $appelation
	 */
	public function update(Appelation $appelation)
	{
		$this->app['orm.em']->persist($appelation);
		$this->app['orm.em']->flush();
	}
	
	/**
	 * Met à jour une appelation dans la base de données
	 *
	 * @param Appelation $appelation
	 */
	public function delete(Appelation $appelation)
	{
		$this->app['orm.em']->remove($appelation);
		$this->app['orm.em']->flush();
	}
}
