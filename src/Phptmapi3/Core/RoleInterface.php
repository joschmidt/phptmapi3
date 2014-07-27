<?php
/*
 * PHPTMAPI is hereby released into the public domain; 
 * and comes with NO WARRANTY.
 * 
 * No one owns PHPTMAPI: you may use it freely in both commercial and
 * non-commercial applications, bundle it with your software
 * distribution, include it on a CD-ROM, list the source code in a
 * book, mirror the documentation at your own web site, or use it in
 * any other way you see fit.
 */

namespace Phptmapi3\Core;

/**
 * Represents an association role item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-assoc-role}.
 * 
 * Inherited method <var>getParent()</var> from {@link ConstructInterface}
 * returns the {@link AssociationInterface} to which this role belongs to.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface RoleInterface extends
    \Phptmapi3\Core\ReifiableInterface,
    \Phptmapi3\Core\TypedInterface
{
    /**
     * Returns the {@link TopicInterface} playing this role.
     * 
     * @return TopicInterface The topic playing this role.
     */
    public function getPlayer();
    
    /**
     * Sets the role player.
     * Any previous role player will be overridden by <var>$player</var>.
     * 
     * @param TopicInterface The topic which should play this role.
     * @return void
     * @throws {@link ModelConstraintException} If <var>$player</var> does not
     * 				belong to the parent topic map.
    */
    public function setPlayer(\Phptmapi3\Core\TopicInterface $player);
}