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
 * Represents a topic name item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-topic-name}.
 *
 * Inherited method <var>getParent()</var> from {@link ConstructInterface}
 * returns the {@link TopicInterface} to which this name belongs to.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface NameInterface extends
    \Phptmapi3\Core\ReifiableInterface,
    \Phptmapi3\Core\TypedInterface,
    \Phptmapi3\Core\ScopedInterface
{
    /**
     * Returns the value of this name.
     * 
     * @return string
     */
    public function getValue();

    /**
     * Sets the value of this name.
     * The previous value is overridden.
     * 
     * @param string The name string to be assigned to the name; must not be
     * 				<var>null</var>.
     * @return void
     * @throws {@link ModelConstraintException} If <var>$value</var> is
     * 				<var>null</var>.
     */
    public function setValue($value);

    /**
     * Returns the {@link VariantInterface}s defined for this name.
     * The return array may be empty but must never be <var>null</var>.
     * 
     * @return array An array containing a set of {@link VariantInterface}s.
     */
    public function getVariants();

    /**
     * Creates an {@link VariantInterface} of this topic name with the
     * specified <var>value</var>, <var>datatype</var>, and <var>scope</var>.
     * The newly created {@link VariantInterface} will have the datatype
     * specified by <var>$datatype</var>. 
     * The newly created {@link VariantInterface} will contain all themes from
     * the parent name and the themes specified in <var>$scope</var>.
     * 
     * @param string A string representation of the value.
     * @param string A URI indicating the datatype of the <var>value</var>.
     * 				E.g.http://www.w3.org/2001/XMLSchema#string indicates a string
     * 				value.
     * @param array An array (length >= 1) containing {@link TopicInterface}s,
     * 				each representing a theme.
     * @return VariantInterface
     * @throws {@link ModelConstraintException} If the <var>value</var> or the
     * 				<var>datatype</var> is <var>null</var>, or the scope of the
     * 				variant would not be a true superset of the name's scope, or a
     * 				theme in the scope does not belong to the parent topic map.
     */
    public function createVariant($value, $datatype, array $scope);
}