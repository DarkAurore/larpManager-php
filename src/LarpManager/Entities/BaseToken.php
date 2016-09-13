<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-09-13 08:57:58.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Token
 *
 * @Entity()
 * @Table(name="token")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseToken", "extended":"Token"})
 */
class BaseToken
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45)
     */
    protected $label;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string", length=45)
     */
    protected $tag;

    /**
     * @OneToMany(targetEntity="PersonnageHasToken", mappedBy="token")
     * @JoinColumn(name="id", referencedColumnName="token_id", nullable=false)
     */
    protected $personnageHasTokens;

    public function __construct()
    {
        $this->personnageHasTokens = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Token
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
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Token
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Token
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of tag.
     *
     * @param string $tag
     * @return \LarpManager\Entities\Token
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get the value of tag.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add PersonnageHasToken entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageHasToken $personnageHasToken
     * @return \LarpManager\Entities\Token
     */
    public function addPersonnageHasToken(PersonnageHasToken $personnageHasToken)
    {
        $this->personnageHasTokens[] = $personnageHasToken;

        return $this;
    }

    /**
     * Remove PersonnageHasToken entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageHasToken $personnageHasToken
     * @return \LarpManager\Entities\Token
     */
    public function removePersonnageHasToken(PersonnageHasToken $personnageHasToken)
    {
        $this->personnageHasTokens->removeElement($personnageHasToken);

        return $this;
    }

    /**
     * Get PersonnageHasToken entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageHasTokens()
    {
        return $this->personnageHasTokens;
    }

    public function __sleep()
    {
        return array('id', 'label', 'description', 'tag');
    }
}