<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-01 09:25:47.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BasePost;

/**
 * LarpManager\Entities\Post
 *
 * @Entity(repositoryClass="LarpManager\Repository\PostRepository")
 */
class Post extends BasePost
{
	/**
	 * constructeur
	 */
	public function __construct()
	{
		parent::__construct();
		$this->setCreationDate(new \Datetime('NOW'));
		$this->setUpdateDate(new \Datetime('NOW'));
	}
	
	/**
	 * Fourni le nombre de vue de ce post
	 */
	public function getViews()
	{
		return $this->getPostViews()->count();
	}
	
	/**
	 * Fourni le post initial (ou a défaut lui-même)
	 */
	public function getAncestor()
	{
		if ( $this->getPost() )
		{
			return $this->getPost()->getAncestor();
		}
		return $this;
	}
	
	/**
	 * Fourni la dernière réponse (ou à défaut lui-même)
	 */
	public function getLastPost()
	{
		if ( $this->getPosts()->count() > 0 )
		{
			return $this->getPosts()->last();
		}
		
		return $this;	
	}
	
	/**
	 * Fourni tous les users ayant répondu à ce post (ainsi que l'auteur initial)
	 */
	public function getWatchingUsers()
	{
		return $this->getUsers();
	}
	
	/**
	 * Ajoute un utilisateur dans la liste des utilisateurs qui surveillent le sujet
	 * Uniquement s'il n'est pas déjà dans la liste.
	 * @param unknown $user
	 */
	public function addWatchingUser($user)
	{
		foreach ($this->getWatchingUsers() as $u)
		{
			if ($u == $user) return $this;
		}
			
		return $this->addUser($user);
	}
	
	/**
	 * Retire un utilisateur de la liste des utilisateurs qui surveillent le sujet
	 * @param unknown $user
	 */
	public function removeWatchingUser($user)
	{
		return $this->removeUser($user);
	}
	
	/**
	 * Fourni l'auteur du post
	 */
	public function getUser()
	{
		return $this->getUserRelatedByUserId();
	}
	
	/**
	 * Met a jour l'auteur du post
	 * @param unknown $user
	 */
	public function setUser($user)
	{
		return $this->setUserRelatedByUserId($user);
	}
	
	/**
	 * Determine si le post est un post racine
	 */
	public function isRoot()
	{
		return ( $this->getPost() == null );
	}
			
}