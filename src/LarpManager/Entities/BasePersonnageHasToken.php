<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-17 11:09:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\PersonnageHasToken
 *
 * @Entity()
 * @Table(name="personnage_has_token", indexes={@Index(name="fk_personnage_has_token_token1_idx", columns={"token_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnageHasToken", "extended":"PersonnageHasToken"})
 */
class BasePersonnageHasToken
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="personnageHasTokens")
     * @JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)
     */
    protected $personnage;

    /**
     * @ManyToOne(targetEntity="Token", inversedBy="personnageHasTokens")
     * @JoinColumn(name="token_id", referencedColumnName="id", nullable=false)
     */
    protected $token;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\PersonnageHasToken
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
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\PersonnageHasToken
     */
    public function setPersonnage(Personnage $personnage = null)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get Personnage entity (many to one).
     *
     * @return \LarpManager\Entities\Personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set Token entity (many to one).
     *
     * @param \LarpManager\Entities\Token $token
     * @return \LarpManager\Entities\PersonnageHasToken
     */
    public function setToken(Token $token = null)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get Token entity (many to one).
     *
     * @return \LarpManager\Entities\Token
     */
    public function getToken()
    {
        return $this->token;
    }

    public function __sleep()
    {
        return array('id', 'personnage_id', 'token_id');
    }
}