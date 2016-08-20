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

namespace LarpManager\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * LarpManager\Form\PersonnageXpForm
 *
 * @author kevin
 *
 */
class PersonnageXpForm extends AbstractType
{
	
	/**
	 * Construction du formulaire
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('xp','integer', array(
				'label' => 'Expérience à ajouter',
				'required' => true,
			))
			->add('explanation','text', array(
				'label' => 'Explication',
				'required' => true,
			));
	
	}
	
	/**
	 * Nom du formulaire
	 */
	public function getName()
	{
		return 'personnageXp';
	}
}