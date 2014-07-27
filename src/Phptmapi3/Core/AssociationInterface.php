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
 * Represents an association item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-association}.
 * 
 * Inherited method <var>getParent()</var> from {@link ConstructInterface} 
 * returns the {@link TopicMapInterface} to which this association belongs to.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface AssociationInterface extends
    \Phptmapi3\Core\ReifiableInterface,
    \Phptmapi3\Core\ScopedInterface,
    \Phptmapi3\Core\TypedInterface
{
    /**
     * Returns the {@link RoleInterface}s participating in this association.
     * If <var>$type</var> is not <var>null</var> all roles with the specified
     * <var>type</var> are returned.
     * 
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param TopicInterface The type of the {@link RoleInterface} instances to
     * 				be returned. Default <var>null</var>.
     * @return array An array containing a set of {@link RoleInterface}s.
     */
    public function getRoles(\Phptmapi3\Core\TopicInterface $type=null);

    /**
     * Creates a new {@link RoleInterface} representing a role in this association.
     * 
     * @param TopicInterface The role type.
     * @param TopicInterface The role player.
     * @return RoleInterface A newly created association role.
     * @throws {@link ModelConstraintException} If either <var>$type</var> or
     * 				<var>$player</var> does not belong to the parent topic map.
     */
    public function createRole(
        \Phptmapi3\Core\TopicInterface $type,
        \Phptmapi3\Core\TopicInterface $player
    );
    
    /**
     * Returns the role types participating in this association.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing a set of {@link TopicInterface}s
     * 				representing the role types.
     */
    public function getRoleTypes();
}