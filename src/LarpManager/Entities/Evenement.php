<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-01-04 12:11:53.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseEvenement;

/**
 * LarpManager\Entities\Evenement
 *
 * @Entity()
 */
class Evenement extends BaseEvenement
{
	public function __construct()
	{
		$this->setDateCreation(new \Datetime('NOW'));
		$this->setDateUpdate(new \Datetime('NOW'));
		parent::__construct();
	}
}