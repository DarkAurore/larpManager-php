<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-22 18:38:56.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Restauration
 *
 * @Entity()
 * @Table(name="restauration")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseRestauration", "extended":"Restauration"})
 */
class BaseRestauration
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
     * @OneToMany(targetEntity="UserHasRestauration", mappedBy="restauration")
     * @JoinColumn(name="id", referencedColumnName="restauration_id", nullable=false)
     */
    protected $userHasRestaurations;

    public function __construct()
    {
        $this->userHasRestaurations = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Restauration
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
     * @return \LarpManager\Entities\Restauration
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
     * @return \LarpManager\Entities\Restauration
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
     * Add UserHasRestauration entity to collection (one to many).
     *
     * @param \LarpManager\Entities\UserHasRestauration $userHasRestauration
     * @return \LarpManager\Entities\Restauration
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
     * @return \LarpManager\Entities\Restauration
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

    public function __sleep()
    {
        return array('id', 'label', 'description');
    }
}