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
 * Indicates that a Topic Maps construct is typed.
 * 
 * {@link AssociationInterface}s, {@link RoleInterface}s, 
 * {@link OccurrenceInterface}s, and {@link NameInterface}s are typed.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface TypedInterface extends \Phptmapi3\Core\ConstructInterface
{
    /**
     * Returns the type of this construct.
     * 
     * @return TopicInterface
     */
    public function getType();

    /**
     * Sets the type of this construct.
     * Any previous type is overridden.
     * 
     * @param TopicInterface The topic that should define the nature of this 
     * 				construct.
     * @return void
     * @throws {@link ModelConstraintException} If <var>$type</var> does not 
     * 				belong to the parent topic map.
     */
    public function setType(\Phptmapi3\Core\TopicInterface $type);
}