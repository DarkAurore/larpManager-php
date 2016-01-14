<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-01 09:25:47.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseTopic;

/**
 * LarpManager\Entities\Topic
 *
 * @Entity(repositoryClass="LarpManager\Repository\TopicRepository")
 */
class Topic extends BaseTopic
{
	/**
	 * Constructeur
	 */
	public function __construct()
	{
		parent::__construct();
		$this->setCreationDate(new \Datetime('NOW'));
		$this->setUpdateDate(new \Datetime('NOW'));
	}
	
	/**
	 * Affichage d'un topic
	 */
	public function __toString()
	{
		return $this->getTitle();
	}
	
	/**
	 * Fourni le dernier post d'un topic
	 */
	public function getLastPost($app)
	{
		$lastPost = null;
		
		foreach ( $this->getPosts() as $post )
		{
			if ( $lastPost )
			{
				if ( $post->getCreationDate() > $lastPost->getCreationDate() )
				{
					$lastPost = $post;
				}
			}
			else
			{
				$lastPost = $post;
			}
		}
		
		foreach ( $this->getTopics() as $topic)
		{
			if ( ! $app['security']->isGranted('TOPIC_RIGHT', $topic) )
				continue;
			
			$topicLastPost = $topic->getLastPost($app);
			
			if ( $lastPost && $topicLastPost )
			{
				if ( $topicLastPost->getCreationDate() > $lastPost->getCreationDate() )
				{
					$lastPost = $topicLastPost; 
				}
			}
			else if ( $topicLastPost )
			{
				$lastPost = $topicLastPost;
			}
		}
		
		return $lastPost;
	}
	
	/**
	 * Fourni la liste de tous les ancêtres d'un topic
	 * @param unknown $array
	 */
	public function getAncestor($array = array())
	{
		if ( $this->getTopic() )
		{
			$array = $this->getTopic()->getAncestor($array);
			$array[] = $this->getTopic();
		}
		
		
		return $array;
	}
	
	/**
	 * Fourni le nombre de post dans ce topic et ces descendants.
	 */
	public function getPostCount()
	{
		$count = $this->getPosts()->count();
		foreach ( $this->getTopics() as $topic)
		{
			$count += $topic->getPostCount();
		}
		return $count;
	}
}