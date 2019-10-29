# Tests

Voici le r�pertoire pour cr�er vos tests.
Ces tests utilisent [PHPUnit](https://phpunit.de/)
La version utilis�es est visible dans Composer.

# Comment lancer les tests

PHPUnit est install� dans vendor/phpunit.
Nous allons supposer que vous utilisez Eclipse.

> Il faut que sqlite soit disponible pour votre installation PHP. Pensez � installer sqlite et � v�rifier sqlite.ini ou php.ini afin que le module soit bien charg�.

Il y a deux fa�ons de lancer les tests

### Via la console
Il vous faut lancer phpunit.
Le plus simple est de configurer Eclipse via une commande externe mais il est possible de lancer la commande directement dans la console.

Pour cr��er une commande externe, aller dans Run -> External Tools -> External Tools Configurations...

Cr�er une nouvelle commande et rentrer les param�tres suivants :

* Location :
Mettre le chemin de PHP. Par exemple, le chemin de PHP de votre installation de serveur local
* Working Directory : 
Mettre le chemin de la racine de LarpManager. Par exemple : ${workspace_loc:/larpManager-php} mais cela peut varier selon votre configuration
* Arguemnts : vendor\phpunit\phpunit\phpunit -c app/

Lancer cette commande lancera tous les tests dans la console.

### Via une debug ou run configuration
L'avantage de cette m�thode par rapport � la pr�c�dente est que vous pouvez lancer vos tests en mode debug. Plus un tableau de r�sum� des tests r�ussis / �chou�s un peu plus joli.

Je me baserai sur les configurations de debug mais cela configurera de toutes fa�ons aussi une configuration de run en m�me temps.

Allez dans Debug -> Debug Configurations...
Vous devriez avoir une option "PHPUnit".
Cr�ez une nouvelle configuration.

Dans l'onglet PHPUnit

Cochez le radio "Run all tests in the selected project, source folder or file:" puis la racine de votre projet (par exemple, /larpManager-php)

S�lectionnez dans Execution parameters "Use project's PHPUnit (Composer)"

Dans l'onglet PHP Script

Runtime PHP :
S�lectionnez Project default (mais vous pouvez si vous le souhaitez choisir une autre version de PHP)

Script Arguments : -c app/

Attention � bien choisir un debugger dans Debugger si vous voulez pouvoir debugger. Par exemple, Xdebug.

C'est tout.
Pour lancer les tests, il vous suffit en suite de choisir Run ou Debug de cette configuration.

> Ne pas oublier le param�tre -c app/ quoi qu'il en soit. C'est ce qui va permettre � PHPUnit de trouver les tests.

#Comment faire les tests

Vous pouvez regarder les exemples dans Functional et Unit.
Les tests unitaires sont cens� test� des classes unitairement.
Les tests fonctionnels sont normalement utilis� afin d'executer des sc�narios.

Chaque test h�rite de BaseTestCase ou de WebTestCase

    class XXXControllerTest extends BaseTestCase 
    class XXXEntityTest extends BaseTestCase 
    class XXXControllerTest extends WebTestCase 
    class XXXEntityTest extends WebTestCase 

BaseTestCase propose quelques m�thodes pouvant vous aider telles que

    public function LogIn($client, $username)
qui permet de logguer un utilisateur cr�� via une UserFixture.

ou 

    public Function createApplication()

qui permet de creer l'application de test.

Si vous utilisez directement WebTestCase (qui est le test case PHPUnit de base) vous devrez red�finir au moins certaines m�thodes telles que createApplication et tearDown

### Tests non connect�s
Il vous suffit d'h�ritez de la classe BaseTestCase.
L'application sera automatiquement cr��e et vous serez appel� sur chaque m�thode qui commence par testXXX.
Par exemple

    <?php
    namespace LarpManager\Tests\Controller;

    require_once(__DIR__ . "\..\..\BaseTestCase.php");
    
    use LarpManager\Tests\BaseTestCase;

    class XXXControllerTest extends BaseTestCase
    {
    	public function testIndex()
	{
            //Votre test
            $this->assertTrue($myExpression);
	}
    }

Pour plus d'informations sur les m�thodes de test de phpunit, vous pouvez regarder la doc de PHPUnit

### Tests connect�s

Vous disposez de quelques m�thodes pour faire les tests connect�s.

Premi�rement, une base est automatiquement cr��e dans un sqlite "in memory", c'est donc relativement rapide.
La base est cr��e et d�truite pour chaque classe de test.
Vous pouvez cr�er un client puis faire des requ�tes

    $client = static::createClient();
    $crawler = $client->request('GET','/');
    $this->assertTrue($client->getResponse()->isOk());

Vous pouvez aussi cr�er des utilisateurs et les logguer

    $fixture = new UserFixture();
    $fixture->load($this->app["orm.em"]);
    $client = static::createClient();
    $client = $this->LogIn($client, "testuser");

Vous pouvez cr�er vos propres "fixtures" dans le r�pertoire DataFixtures.
Les fixtures sont des entit�es Silex que vous pouvez persister en base.

L'utilisateur loggu� par LogIn doit avoir �t� cr�� par une fixture.

# Fonctionnement interne

Les tests se basent sur la configuration recommand�e par Silex
https://silex.symfony.com/doc/1.3/testing.html

Entre autre, il existe un fichier phpunit.xml.dist qui est dans /app et qui contient les param�tres de lancement des tests.

* L'environnement de test est s�lectionn� dans bootstrap.php via 
```
    if(isset($_ENV['env']) && $_ENV['env'] == 'test')
    {
        $app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../config/test_settings_sqlite.yml'));
    }
```
On peut ainsi voir dans test\_settings\_sqlite.yml la configuration de test de l'application

* Le login utilise les deux firewalls d�finis par l'application : secured\_area et public\_area.
    
# Un dernier mot
* Chaque commit devrait �tre fait si et seulement si aucun test n'est cass�... Il faut donc rejouer tous les tests avant un merge branch...
* Il est possible d'utiliser Selenium ou d'autres �mulateurs de browser pour faire les tests fonctionnels.
Mais l'approche ici est de tester le contenu de la page cible en cherchant diff�rentes chaines de texte ou balise, et non de tester le rendu.
* L'infrastructure de test est assez embryonnaire, si vous avez des super id�es pour �toffer la chose allez-y.