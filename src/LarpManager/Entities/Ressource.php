<?php

/**
 * LarpManager - A Live Action Role Playing Manager
 * Copyright (C) 2016 Kevin Polez
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-01 07:07:12.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseRessource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Ressource
 *
* @Entity(repositoryClass="LarpManager\Repository\RessourceRepository")
 */
class Ressource extends BaseRessource
{
	/**
	 * @ManyToMany(targetEntity="Territoire", mappedBy="exportations")
	 */
	protected $exportateurs;
	
	/**
	 * @ManyToMany(targetEntity="Territoire", mappedBy="importations")
	 */
	protected $importateurs;
	
	public function __construct()
	{
		$this->exportateurs = new ArrayCollection();
		$this->importateurs = new ArrayCollection();
	
		parent::__construct();
	}
	
	public function __toString()
	{
		return $this->getLabel();
	}
	
	public function getExportateurs()
	{
		return $this->exportateurs;
	}
	
	public function getImportateurs()
	{
		return $this->importateurs;
	}
	
	public function addImportateur($territoire)
	{
		$this->importateurs[] = $territoire;
		return $this;
	}
	
	public function removeImportateur($territoire)
	{
		$this->importateurs->removeElement($territoire);
		return $this;
	}
	
	public function addExportateur($territoire)
	{
		$this->exportateurs[] = $territoire;
		return $this;
	}
	
	public function removeExportateur($territoire)
	{
		$this->exportateurs->removeElement($territoire);
		return $this;
	}
		
}