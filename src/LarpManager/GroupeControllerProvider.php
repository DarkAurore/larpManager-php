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

namespace LarpManager;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * LarpManager\GroupeControllerProvider
 * 
 * @author kevin
 *
 */
class GroupeControllerProvider implements ControllerProviderInterface
{
	/**
	 * Initialise les routes pour les groupes
	 * Routes :
	 *  - groupe.diplomatie
	 * 	- groupe
	 * 	- groupe.add
	 *  - groupe.update
	 *  - groupe.detail
	 *  - groupe.gestion
	 *  - groupe.joueur
	 *  - groupe.place
	 *  - groupe.requestAlliance
	 *  - groupe.cancelRequestedAlliance
	 *  - groupe.acceptAlliance
	 *  - groupe.refuseAlliance
	 *  - groupe.breakAlliance
	 *  - groupe.declareWar
	 *  - groupe.requestPeace
	 *  - groupe.acceptPeace
	 *  - groupe.refusePeace
	 *
	 * @param Application $app
	 * @return Controllers $controllers
	 * @throws AccessDeniedException
	 */
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		/**
		 * Vérifie que l'utilisateur dispose du role SCENARISTE
		 */
		$mustBeScenariste = function(Request $request) use ($app) {
			if (!$app['security.authorization_checker']->isGranted('ROLE_SCENARISTE')) {
				throw new AccessDeniedException();
			}
		};
		
		/**
		 * Vérifie que l'utilisateur dispose du role ADMIN
		 * @var unknown $mustBeAdmin
		 */
		$mustBeAdmin = function(Request $request) use ($app) {
			if (!$app['security.authorization_checker']->isGranted('ROLE_ADMIN')) {
				throw new AccessDeniedException();
			}
		};
		
		/**
		 * Vérifie que l'utilisateur est membre du groupe
		 * @var unknown $mustBeMember
		 */
		$mustBeMember = function(Request $request) use ($app) {
			if (!$app['security.authorization_checker']->isGranted('GROUPE_MEMBER', $request->get('index'))) {
				throw new AccessDeniedException();
			}
		};
		
		/**
		 * Vérifie que l'utilisateur est responsable du groupe
		 * @var unknown $mustBeResponsable
		 */
		$mustBeResponsable = function(Request $request) use ($app) {
			if (!$app['security.authorization_checker']->isGranted('GROUPE_RESPONSABLE', $request->get('groupe'))) {
				throw new AccessDeniedException();
			}
		};
		
		/**
		 * Accueil groupe pour les joueurs
		 */
		$controllers->match('/','LarpManager\Controllers\GroupeController::accueilAction')
			->bind("groupe")
			->method('GET');
			
		/**
		 * Ajoute un nouveau personnage dans un groupe
		 */
		$controllers->match('/{index}/personnage/add','LarpManager\Controllers\GroupeController::personnageAddAction')
			->assert('index', '\d+')
			->bind("groupe.personnage.add")
			->method('GET|POST')
			->before($mustBeMember);
							
		/**
		 * Demander une alliance
		 */
		$controllers->match('/{groupe}/alliance/request','LarpManager\Controllers\GroupeController::requestAllianceAction')
			->assert('groupe', '\d+')
			->bind("groupe.requestAlliance")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->before($mustBeResponsable);

		/**
		 * Annuler une demande d'alliance
		 */
		$controllers->match('/{groupe}/alliance/{alliance}/cancel','LarpManager\Controllers\GroupeController::cancelRequestedAllianceAction')
			->assert('groupe', '\d+')
			->assert('alliance', '\d+')
			->bind("groupe.cancelRequestedAlliance")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('alliance', 'converter.alliance:convert')
			->before($mustBeResponsable);
		
		/**
		 * Accepter une alliance
		 */
		$controllers->match('/{groupe}/alliance/{alliance}/accept','LarpManager\Controllers\GroupeController::acceptAllianceAction')
			->assert('groupe', '\d+')
			->assert('alliance', '\d+')
			->bind("groupe.acceptAlliance")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('alliance', 'converter.alliance:convert')
			->before($mustBeResponsable);
		
		/**
		 * Refuser une alliance
		 */
		$controllers->match('/{groupe}/alliance/{alliance}/refuse','LarpManager\Controllers\GroupeController::refuseAllianceAction')
			->assert('groupe', '\d+')
			->assert('alliance', '\d+')
			->bind("groupe.refuseAlliance")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('alliance', 'converter.alliance:convert')
			->before($mustBeResponsable);			

		/**
		 * Casser une alliance
		 */
		$controllers->match('/{groupe}/alliance/{alliance}/break','LarpManager\Controllers\GroupeController::breakAllianceAction')
			->assert('groupe', '\d+')
			->assert('alliance', '\d+')
			->bind("groupe.breakAlliance")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('alliance', 'converter.alliance:convert')
			->before($mustBeResponsable);

		/**
		 * Déclarer la guerre
		 */
		$controllers->match('/{groupe}/enemy/declareWar','LarpManager\Controllers\GroupeController::declareWarAction')
			->assert('groupe', '\d+')
			->bind("groupe.declareWar")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->before($mustBeResponsable);			
			

		/**
		 * Demander la paix
		 */
		$controllers->match('/{groupe}/peace/{enemy}/requestPeace','LarpManager\Controllers\GroupeController::requestPeaceAction')
			->assert('groupe', '\d+')
			->assert('enemy', '\d+')
			->bind("groupe.requestPeace")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('enemy', 'converter.enemy:convert')
			->before($mustBeResponsable);
		
		/**
		 * Accepter la paix
		 */
		$controllers->match('/{groupe}/peace/{enemy}/acceptPeace','LarpManager\Controllers\GroupeController::acceptPeaceAction')
			->assert('groupe', '\d+')
			->assert('enemy', '\d+')
			->bind("groupe.acceptPeace")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('enemy', 'converter.enemy:convert')
			->before($mustBeResponsable);			
		
		/**
		 * Refuser la paix
		 */
		$controllers->match('/{groupe}/peace/{enemy}/refusePeace','LarpManager\Controllers\GroupeController::refusePeaceAction')
			->assert('groupe', '\d+')
			->assert('enemy', '\d+')
			->bind("groupe.refusePeace")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('enemy', 'converter.enemy:convert')
			->before($mustBeResponsable);
			
		/**
		 * Annuler une demande de paix
		 */
		$controllers->match('/{groupe}/peace/{enemy}/cancel','LarpManager\Controllers\GroupeController::cancelRequestedPeaceAction')
			->assert('groupe', '\d+')
			->assert('enemy', '\d+')
			->bind("groupe.cancelRequestedPeace")
			->method('GET|POST')
			->convert('groupe', 'converter.groupe:convert')
			->convert('enemy', 'converter.enemy:convert')
			->before($mustBeResponsable);			

		/**
		 * Surveiller la diplomatie entre groupe
		 */
		$controllers->match('/diplomatie', 'LarpManager\Controllers\GroupeController::diplomatieAction')
			->bind("groupe.diplomatie")
			->method('GET')
			->before($mustBeResponsable);
			
		/**
		 * Surveiller la diplomatie entre groupe
		 */
		$controllers->match('/diplomatie/print', 'LarpManager\Controllers\GroupeController::diplomatiePrintAction')
			->bind("groupe.diplomatie.print")
			->method('GET')
			->before($mustBeResponsable);
		
		/**
		 * Liste des groupes
		 */
		$controllers->match('/admin/list','LarpManager\Controllers\GroupeController::adminListAction')
			->bind("groupe.admin.list")
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Ratacher un groupe à un pays
		 */
		$controllers->match('/admin/{groupe}/pays','LarpManager\Controllers\GroupeController::adminPaysAction')
			->bind("groupe.admin.pays.update")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Retirer un participant du groupe
		 */
		$controllers->match('/admin/{groupe}/participant/{participant}/remove','LarpManager\Controllers\GroupeController::adminParticipantRemoveAction')
			->bind("groupe.admin.participant.remove")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Retirer un participant du groupe
		 */
		$controllers->match('/admin/{groupe}/participant/add','LarpManager\Controllers\GroupeController::adminParticipantAddAction')
			->bind("groupe.admin.participant.add")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
		
		/**
		 * Gestion des documents lié au groupe
		 */
		$controllers->match('/admin/{groupe}/documents','LarpManager\Controllers\GroupeController::adminDocumentAction')
			->bind("groupe.admin.documents")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Rechercher un groupe
		 */
		$controllers->match('/search','LarpManager\Controllers\GroupeController::searchAction')
			->bind("groupe.search")
			->method('GET|POST')
			->before($mustBeScenariste);
				
		/**
		 * Detail d'un groupe
		 */
		$controllers->match('/{index}','LarpManager\Controllers\GroupeController::detailAction')
			->assert('index', '\d+')
			->bind("groupe.detail")
			->method('GET')
			->before($mustBeScenariste);			
		
		/**
		 *  Ajout d'un groupe (Scénariste uniquement)
		 */
		$controllers->match('/add','LarpManager\Controllers\GroupeController::addAction')
			->bind("groupe.add")
			->method('GET|POST')
			->before($mustBeScenariste);

		/**
		 * Modification des places disponibles (Admin uniquement)
		 */
		$controllers->match('/place','LarpManager\Controllers\GroupeController::placeAction')
			->bind("groupe.place")
			->method('GET|POST')
			->before($mustBeAdmin);
			
		/**
		 * Restauration des membres du groupe (Admin uniquement)
		 */
		$controllers->match('/{groupe}/restauration','LarpManager\Controllers\GroupeController::restaurationAction')
			->assert('groupe', '\d+')
			->bind("groupe.restauration")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeAdmin);
			
		/**
		 * Impression du matériel necessaire
		 */
		$controllers->match('/{groupe}/print/materiel','LarpManager\Controllers\GroupeController::printMaterielAction')
			->assert('groupe', '\d+')
			->bind("groupe.print.materiel")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);
			
		/**
		 * Impression du matériel necessaire
		 */
		$controllers->match('/{groupe}/print/materiel/groupe','LarpManager\Controllers\GroupeController::printMaterielGroupeAction')
			->assert('groupe', '\d+')
			->bind("groupe.print.materiel.groupe")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);
			
		/**
		 * Impression des fiches de perso
		 */
		$controllers->match('/{groupe}/print/perso','LarpManager\Controllers\GroupeController::printPersoAction')
			->assert('groupe', '\d+')
			->bind("groupe.print.perso")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);
			
		/**
		 * Impression du background
		 */
		$controllers->match('/{groupe}/print/background','LarpManager\Controllers\GroupeController::printBackgroundAction')
			->assert('groupe', '\d+')
			->bind("groupe.print.background")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);
			
		/**
		 * lock
		 */
		$controllers->match('/{groupe}/lock','LarpManager\Controllers\GroupeController::lockAction')
			->assert('groupe', '\d+')
			->bind("groupe.lock")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);
			
		/**
		 * unlock
		 */
		$controllers->match('/{groupe}/unlock','LarpManager\Controllers\GroupeController::unlockAction')
			->assert('groupe', '\d+')
			->bind("groupe.unlock")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET')
			->before($mustBeScenariste);

		/**
		 * Génération de quêtes commerciales
		 */
		$controllers->match('/quetes/','LarpManager\Controllers\GroupeController::quetesAction')
			->bind("groupe.quetes")
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Génération de quêtes commerciales
		 */
		$controllers->match('/{groupe}/quete/','LarpManager\Controllers\GroupeController::queteAction')
			->assert('groupe', '\d+')
			->bind("groupe.quete")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Ajouter un territoire
		 */
		$controllers->match('/{groupe}/territoire/add','LarpManager\Controllers\GroupeController::territoireAddAction')
			->assert('groupe', '\d+')
			->bind("groupe.territoire.add")
			->convert('groupe', 'converter.groupe:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 * Retirer un territoire
		 */
		$controllers->match('/{groupe}/territoire/{territoire}/remove','LarpManager\Controllers\GroupeController::territoireRemoveAction')
			->assert('groupe', '\d+')
			->bind("groupe.territoire.remove")
			->convert('groupe', 'converter.groupe:convert')
			->convert('territoire', 'converter.territoire:convert')
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 *  Mise à jour d'un groupe (scénariste uniquement)
		 */
		$controllers->match('/{index}/update','LarpManager\Controllers\GroupeController::updateAction')
			->assert('index', '\d+')
			->bind("groupe.update")
			->method('GET|POST')
			->before($mustBeScenariste);

		/**
		 * Ajout d'un background (scénariste uniquement)
		 */
		$controllers->match('/{index}/background/add','LarpManager\Controllers\GroupeController::addBackgroundAction')
			->assert('index', '\d+')
			->bind("groupe.background.add")
			->method('GET|POST')
			->before($mustBeScenariste);
			
		/**
		 *  Modification d'un background (scénariste uniquement)
		 */
		$controllers->match('/{index}/background/update','LarpManager\Controllers\GroupeController::updateBackgroundAction')
			->assert('index', '\d+')
			->bind("groupe.background.update")
			->method('GET|POST')
			->before($mustBeScenariste);
			
		return $controllers;
	}
}
