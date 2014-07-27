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
 * Indicates that a statement (a Topic Maps construct) has a scope.
 * 
 * {@link AssociationInterface}s, {@link OccurrenceInterface}s, 
 * {@link NameInterface}s, and {@link VariantInterface}s are scoped.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface ScopedInterface extends \Phptmapi3\Core\ConstructInterface
{
    /**
     * Returns the {@link TopicInterface}s which define the scope.
     * An empty array represents the unconstrained scope.
     * 
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing a set of {@link TopicInterface}s which
     * 				define the scope.
     */
    public function getScope();

    /**
     * Adds a {@link TopicInterface} to the scope.
     * 
     * @param TopicInterface The topic which should be added to the scope.
     * @return void
    */
    public function addTheme(\Phptmapi3\Core\TopicInterface $theme);

    /**
     * Removes a {@link TopicInterface} from the scope.
     * 
     * @param TopicInterface The topic which should be removed from the scope.
     * @return void
     */
    public function removeTheme(\Phptmapi3\Core\TopicInterface $theme);
}