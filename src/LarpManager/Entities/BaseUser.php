<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-22 18:38:57.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\User
 *
 * @Entity()
 * @Table(name="`user`", indexes={@Index(name="fk_user_etat_civil1_idx", columns={"etat_civil_id"}), @Index(name="fk_user_personnage_secondaire1_idx", columns={"personnage_secondaire_id"})}, uniqueConstraints={@UniqueConstraint(name="email_UNIQUE", columns={"email"}), @UniqueConstraint(name="username_UNIQUE", columns={"username"}), @UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseUser", "extended":"User"})
 */
class BaseUser
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $email;

    /**
     * @Column(name="`password`", type="string", length=255, nullable=true)
     */
    protected $password;

    /**
     * @Column(type="string", length=255)
     */
    protected $salt;

    /**
     * @Column(type="string", length=255)
     */
    protected $rights;

    /**
     * @Column(type="datetime")
     */
    protected $creation_date;

    /**
     * @Column(type="string", length=100)
     */
    protected $username;

    /**
     * @Column(type="boolean")
     */
    protected $isEnabled;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $confirmationToken;

    /**
     * @Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $timePasswordResetRequested;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $trombineUrl;

    /**
     * @OneToMany(targetEntity="Background", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $backgrounds;

    /**
     * @OneToMany(targetEntity="Billet", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="createur_id", nullable=false)
     */
    protected $billets;

    /**
     * @OneToMany(targetEntity="Document", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $documents;

    /**
     * @OneToMany(targetEntity="Groupe", mappedBy="userRelatedByScenaristeId")
     * @JoinColumn(name="id", referencedColumnName="scenariste_id", nullable=false)
     */
    protected $groupeRelatedByScenaristeIds;

    /**
     * @OneToMany(targetEntity="Groupe", mappedBy="userRelatedByResponsableId")
     * @JoinColumn(name="id", referencedColumnName="responsable_id", nullable=false)
     */
    protected $groupeRelatedByResponsableIds;

    /**
     * @OneToMany(targetEntity="Message", mappedBy="userRelatedByAuteur")
     * @JoinColumn(name="id", referencedColumnName="auteur", nullable=false)
     */
    protected $messageRelatedByAuteurs;

    /**
     * @OneToMany(targetEntity="Message", mappedBy="userRelatedByDestinataire")
     * @JoinColumn(name="id", referencedColumnName="destinataire", nullable=false)
     */
    protected $messageRelatedByDestinataires;

    /**
     * @OneToMany(targetEntity="Objet", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="responsable_id", nullable=false)
     */
    protected $objets;

    /**
     * @OneToMany(targetEntity="Participant", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $participants;

    /**
     * @OneToMany(targetEntity="PersonnageBackground", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $personnageBackgrounds;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="userRelatedByUserId")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $postRelatedByUserIds;

    /**
     * @OneToMany(targetEntity="PostView", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $postViews;

    /**
     * @OneToMany(targetEntity="Restriction", mappedBy="userRelatedByAuteurId")
     * @JoinColumn(name="id", referencedColumnName="auteur_id", nullable=false)
     */
    protected $restrictionRelatedByAuteurIds;

    /**
     * @OneToMany(targetEntity="Topic", mappedBy="user")
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $topics;

    /**
     * @OneToMany(targetEntity="UserHasBillet", mappedBy="user", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $userHasBillets;

    /**
     * @OneToMany(targetEntity="UserHasRestauration", mappedBy="user", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $userHasRestaurations;

    /**
     * @OneToOne(targetEntity="EtatCivil", inversedBy="user")
     * @JoinColumn(name="etat_civil_id", referencedColumnName="id")
     */
    protected $etatCivil;

    /**
     * @ManyToOne(targetEntity="PersonnageSecondaire", inversedBy="users")
     * @JoinColumn(name="personnage_secondaire_id", referencedColumnName="id")
     */
    protected $personnageSecondaire;

    /**
     * @ManyToMany(targetEntity="Personnage", inversedBy="users")
     * @JoinTable(name="user_has_personnage",
     *     joinColumns={@JoinColumn(name="user_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $personnages;

    /**
     * @ManyToMany(targetEntity="Restriction", inversedBy="users")
     * @JoinTable(name="user_has_restriction",
     *     joinColumns={@JoinColumn(name="user_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="restriction_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $restrictions;

    /**
     * @ManyToMany(targetEntity="Post", mappedBy="users")
     */
    protected $posts;

    public function __construct()
    {
        $this->backgrounds = new ArrayCollection();
        $this->billets = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->groupeRelatedByScenaristeIds = new ArrayCollection();
        $this->groupeRelatedByResponsableIds = new ArrayCollection();
        $this->messageRelatedByAuteurs = new ArrayCollection();
        $this->messageRelatedByDestinataires = new ArrayCollection();
        $this->objets = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->personnageBackgrounds = new ArrayCollection();
        $this->postRelatedByUserIds = new ArrayCollection();
        $this->postViews = new ArrayCollection();
        $this->restrictionRelatedByAuteurIds = new ArrayCollection();
        $this->topics = new ArrayCollection();
        $this->userHasBillets = new ArrayCollection();
        $this->userHasRestaurations = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->restrictions = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     * @return \LarpManager\Entities\User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return \LarpManager\Entities\User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of salt.
     *
     * @param string $salt
     * @return \LarpManager\Entities\User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the value of rights.
     *
     * @param string $rights
     * @return \LarpManager\Entities\User
     */
    public function setRights($rights)
    {
        $this->rights = $rights;

        return $this;
    }

    /**
     * Get the value of rights.
     *
     * @return string
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\User
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of creation_date.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of username.
     *
     * @param string $username
     * @return \LarpManager\Entities\User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of isEnabled.
     *
     * @param boolean $isEnabled
     * @return \LarpManager\Entities\User
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get the value of isEnabled.
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Set the value of confirmationToken.
     *
     * @param string $confirmationToken
     * @return \LarpManager\Entities\User
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get the value of confirmationToken.
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set the value of timePasswordResetRequested.
     *
     * @param integer $timePasswordResetRequested
     * @return \LarpManager\Entities\User
     */
    public function setTimePasswordResetRequested($timePasswordResetRequested)
    {
        $this->timePasswordResetRequested = $timePasswordResetRequested;

        return $this;
    }

    /**
     * Get the value of timePasswordResetRequested.
     *
     * @return integer
     */
    public function getTimePasswordResetRequested()
    {
        return $this->timePasswordResetRequested;
    }

    /**
     * Set the value of trombineUrl.
     *
     * @param string $trombineUrl
     * @return \LarpManager\Entities\User
     */
    public function setTrombineUrl($trombineUrl)
    {
        $this->trombineUrl = $trombineUrl;

        return $this;
    }

    /**
     * Get the value of trombineUrl.
     *
     * @return string
     */
    public function getTrombineUrl()
    {
        return $this->trombineUrl;
    }

    /**
     * Add Background entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Background $background
     * @return \LarpManager\Entities\User
     */
    public function addBackground(Background $background)
    {
        $this->backgrounds[] = $background;

        return $this;
    }

    /**
     * Remove Background entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Background $background
     * @return \LarpManager\Entities\User
     */
    public function removeBackground(Background $background)
    {
        $this->backgrounds->removeElement($background);

        return $this;
    }

    /**
     * Get Background entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBackgrounds()
    {
        return $this->backgrounds;
    }

    /**
     * Add Billet entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Billet $billet
     * @return \LarpManager\Entities\User
     */
    public function addBillet(Billet $billet)
    {
        $this->billets[] = $billet;

        return $this;
    }

    /**
     * Remove Billet entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Billet $billet
     * @return \LarpManager\Entities\User
     */
    public function removeBillet(Billet $billet)
    {
        $this->billets->removeElement($billet);

        return $this;
    }

    /**
     * Get Billet entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillets()
    {
        return $this->billets;
    }

    /**
     * Add Document entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\User
     */
    public function addDocument(Document $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove Document entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\User
     */
    public function removeDocument(Document $document)
    {
        $this->documents->removeElement($document);

        return $this;
    }

    /**
     * Get Document entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Add Groupe entity related by `scenariste_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\User
     */
    public function addGroupeRelatedByScenaristeId(Groupe $groupe)
    {
        $this->groupeRelatedByScenaristeIds[] = $groupe;

        return $this;
    }

    /**
     * Remove Groupe entity related by `scenariste_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\User
     */
    public function removeGroupeRelatedByScenaristeId(Groupe $groupe)
    {
        $this->groupeRelatedByScenaristeIds->removeElement($groupe);

        return $this;
    }

    /**
     * Get Groupe entity related by `scenariste_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupeRelatedByScenaristeIds()
    {
        return $this->groupeRelatedByScenaristeIds;
    }

    /**
     * Add Groupe entity related by `responsable_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\User
     */
    public function addGroupeRelatedByResponsableId(Groupe $groupe)
    {
        $this->groupeRelatedByResponsableIds[] = $groupe;

        return $this;
    }

    /**
     * Remove Groupe entity related by `responsable_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\User
     */
    public function removeGroupeRelatedByResponsableId(Groupe $groupe)
    {
        $this->groupeRelatedByResponsableIds->removeElement($groupe);

        return $this;
    }

    /**
     * Get Groupe entity related by `responsable_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupeRelatedByResponsableIds()
    {
        return $this->groupeRelatedByResponsableIds;
    }

    /**
     * Add Message entity related by `auteur` to collection (one to many).
     *
     * @param \LarpManager\Entities\Message $message
     * @return \LarpManager\Entities\User
     */
    public function addMessageRelatedByAuteur(Message $message)
    {
        $this->messageRelatedByAuteurs[] = $message;

        return $this;
    }

    /**
     * Remove Message entity related by `auteur` from collection (one to many).
     *
     * @param \LarpManager\Entities\Message $message
     * @return \LarpManager\Entities\User
     */
    public function removeMessageRelatedByAuteur(Message $message)
    {
        $this->messageRelatedByAuteurs->removeElement($message);

        return $this;
    }

    /**
     * Get Message entity related by `auteur` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessageRelatedByAuteurs()
    {
        return $this->messageRelatedByAuteurs;
    }

    /**
     * Add Message entity related by `destinataire` to collection (one to many).
     *
     * @param \LarpManager\Entities\Message $message
     * @return \LarpManager\Entities\User
     */
    public function addMessageRelatedByDestinataire(Message $message)
    {
        $this->messageRelatedByDestinataires[] = $message;

        return $this;
    }

    /**
     * Remove Message entity related by `destinataire` from collection (one to many).
     *
     * @param \LarpManager\Entities\Message $message
     * @return \LarpManager\Entities\User
     */
    public function removeMessageRelatedByDestinataire(Message $message)
    {
        $this->messageRelatedByDestinataires->removeElement($message);

        return $this;
    }

    /**
     * Get Message entity related by `destinataire` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessageRelatedByDestinataires()
    {
        return $this->messageRelatedByDestinataires;
    }

    /**
     * Add Objet entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\User
     */
    public function addObjet(Objet $objet)
    {
        $this->objets[] = $objet;

        return $this;
    }

    /**
     * Remove Objet entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Objet $objet
     * @return \LarpManager\Entities\User
     */
    public function removeObjet(Objet $objet)
    {
        $this->objets->removeElement($objet);

        return $this;
    }

    /**
     * Get Objet entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjets()
    {
        return $this->objets;
    }

    /**
     * Add Participant entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\User
     */
    public function addParticipant(Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove Participant entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\User
     */
    public function removeParticipant(Participant $participant)
    {
        $this->participants->removeElement($participant);

        return $this;
    }

    /**
     * Get Participant entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Add PersonnageBackground entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageBackground $personnageBackground
     * @return \LarpManager\Entities\User
     */
    public function addPersonnageBackground(PersonnageBackground $personnageBackground)
    {
        $this->personnageBackgrounds[] = $personnageBackground;

        return $this;
    }

    /**
     * Remove PersonnageBackground entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageBackground $personnageBackground
     * @return \LarpManager\Entities\User
     */
    public function removePersonnageBackground(PersonnageBackground $personnageBackground)
    {
        $this->personnageBackgrounds->removeElement($personnageBackground);

        return $this;
    }

    /**
     * Get PersonnageBackground entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageBackgrounds()
    {
        return $this->personnageBackgrounds;
    }

    /**
     * Add Post entity related by `user_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\User
     */
    public function addPostRelatedByUserId(Post $post)
    {
        $this->postRelatedByUserIds[] = $post;

        return $this;
    }

    /**
     * Remove Post entity related by `user_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\User
     */
    public function removePostRelatedByUserId(Post $post)
    {
        $this->postRelatedByUserIds->removeElement($post);

        return $this;
    }

    /**
     * Get Post entity related by `user_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostRelatedByUserIds()
    {
        return $this->postRelatedByUserIds;
    }

    /**
     * Add PostView entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PostView $postView
     * @return \LarpManager\Entities\User
     */
    public function addPostView(PostView $postView)
    {
        $this->postViews[] = $postView;

        return $this;
    }

    /**
     * Remove PostView entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PostView $postView
     * @return \LarpManager\Entities\User
     */
    public function removePostView(PostView $postView)
    {
        $this->postViews->removeElement($postView);

        return $this;
    }

    /**
     * Get PostView entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostViews()
    {
        return $this->postViews;
    }

    /**
     * Add Restriction entity related by `auteur_id` to collection (one to many).
     *
     * @param \LarpManager\Entities\Restriction $restriction
     * @return \LarpManager\Entities\User
     */
    public function addRestrictionRelatedByAuteurId(Restriction $restriction)
    {
        $this->restrictionRelatedByAuteurIds[] = $restriction;

        return $this;
    }

    /**
     * Remove Restriction entity related by `auteur_id` from collection (one to many).
     *
     * @param \LarpManager\Entities\Restriction $restriction
     * @return \LarpManager\Entities\User
     */
    public function removeRestrictionRelatedByAuteurId(Restriction $restriction)
    {
        $this->restrictionRelatedByAuteurIds->removeElement($restriction);

        return $this;
    }

    /**
     * Get Restriction entity related by `auteur_id` collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRestrictionRelatedByAuteurIds()
    {
        return $this->restrictionRelatedByAuteurIds;
    }

    /**
     * Add Topic entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\User
     */
    public function addTopic(Topic $topic)
    {
        $this->topics[] = $topic;

        return $this;
    }

    /**
     * Remove Topic entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\User
     */
    public function removeTopic(Topic $topic)
    {
        $this->topics->removeElement($topic);

        return $this;
    }

    /**
     * Get Topic entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Add UserHasBillet entity to collection (one to many).
     *
     * @param \LarpManager\Entities\UserHasBillet $userHasBillet
     * @return \LarpManager\Entities\User
     */
    public function addUserHasBillet(UserHasBillet $userHasBillet)
    {
        $this->userHasBillets[] = $userHasBillet;

        return $this;
    }

    /**
     * Remove UserHasBillet entity from collection (one to many).
     *
     * @param \LarpManager\Entities\UserHasBillet $userHasBillet
     * @return \LarpManager\Entities\User
     */
    public function removeUserHasBillet(UserHasBillet $userHasBillet)
    {
        $this->userHasBillets->removeElement($userHasBillet);

        return $this;
    }

    /**
     * Get UserHasBillet entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserHasBillets()
    {
        return $this->userHasBillets;
    }

    /**
     * Add UserHasRestauration entity to collection (one to many).
     *
     * @param \LarpManager\Entities\UserHasRestauration $userHasRestauration
     * @return \LarpManager\Entities\User
     */
    public function addUserHasRestauration(UserHasRestauration $userHasRestauration)
    {
        $this->userHasRestaurations[] = $userHasRestauration;

        return $this;
    }

    /**
     * Remove UserHasRestauration entity from collection (one to many).
     *
     * @param \LarpManager\Entities\UserHasRestauration $userHasRestauration
     * @return \LarpManager\Entities\User
     */
    public function removeUserHasRestauration(UserHasRestauration $userHasRestauration)
    {
        $this->userHasRestaurations->removeElement($userHasRestauration);

        return $this;
    }

    /**
     * Get UserHasRestauration entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserHasRestaurations()
    {
        return $this->userHasRestaurations;
    }

    /**
     * Set EtatCivil entity (one to one).
     *
     * @param \LarpManager\Entities\EtatCivil $etatCivil
     * @return \LarpManager\Entities\User
     */
    public function setEtatCivil(EtatCivil $etatCivil)
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    /**
     * Get EtatCivil entity (one to one).
     *
     * @return \LarpManager\Entities\EtatCivil
     */
    public function getEtatCivil()
    {
        return $this->etatCivil;
    }

    /**
     * Set PersonnageSecondaire entity (many to one).
     *
     * @param \LarpManager\Entities\PersonnageSecondaire $personnageSecondaire
     * @return \LarpManager\Entities\User
     */
    public function setPersonnageSecondaire(PersonnageSecondaire $personnageSecondaire = null)
    {
        $this->personnageSecondaire = $personnageSecondaire;

        return $this;
    }

    /**
     * Get PersonnageSecondaire entity (many to one).
     *
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function getPersonnageSecondaire()
    {
        return $this->personnageSecondaire;
    }

    /**
     * Add Personnage entity to collection.
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\User
     */
    public function addPersonnage(Personnage $personnage)
    {
        $personnage->addUser($this);
        $this->personnages[] = $personnage;

        return $this;
    }

    /**
     * Remove Personnage entity from collection.
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\User
     */
    public function removePersonnage(Personnage $personnage)
    {
        $personnage->removeUser($this);
        $this->personnages->removeElement($personnage);

        return $this;
    }

    /**
     * Get Personnage entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    /**
     * Add Restriction entity to collection.
     *
     * @param \LarpManager\Entities\Restriction $restriction
     * @return \LarpManager\Entities\User
     */
    public function addRestriction(Restriction $restriction)
    {
        $restriction->addUser($this);
        $this->restrictions[] = $restriction;

        return $this;
    }

    /**
     * Remove Restriction entity from collection.
     *
     * @param \LarpManager\Entities\Restriction $restriction
     * @return \LarpManager\Entities\User
     */
    public function removeRestriction(Restriction $restriction)
    {
        $restriction->removeUser($this);
        $this->restrictions->removeElement($restriction);

        return $this;
    }

    /**
     * Get Restriction entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * Add Post entity to collection.
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\User
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove Post entity from collection.
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\User
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);

        return $this;
    }

    /**
     * Get Post entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function __sleep()
    {
        return array('id', 'email', 'password', 'salt', 'rights', 'creation_date', 'username', 'isEnabled', 'confirmationToken', 'timePasswordResetRequested', 'etat_civil_id', 'trombineUrl', 'personnage_secondaire_id');
    }
}