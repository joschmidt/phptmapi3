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
 * Common base interface for {@link OccurrenceInterface}s and 
 * {@link VariantInterface}s.
 * 
 * See Topic Maps Data Model (TMDM) section 4.4 "Datatypes"
 * ({@link http://www.isotopicmaps.org/sam/sam-model/#d0e507}) for datatype
 * definition.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface DatatypeAwareInterface extends
    \Phptmapi3\Core\ReifiableInterface,
    \Phptmapi3\Core\ScopedInterface
{
    /**
     * Returns the string representation of the value.
     * 
     * @return string The string representation of the value
     * 				(never <var>null</var>).
     */
    public function getValue();

    /**
     * Returns the URI identifying the datatype of the value.
     * E.g. http://www.w3.org/2001/XMLSchema#string indicates a string value.
     * 
     * @return string The datatype of this construct (never <var>null</var>).
     */
    public function getDatatype();

    /**
     * Sets the value and the datatype.
     * 
     * @param string The string representation of the value; must not be
     * 				<var>null</var>.
     * @param string The URI identifying the datatype of the value; must not be
     * 				<var>null</var>. E.g. http://www.w3.org/2001/XMLSchema#string
     * 				indicates a string value.
     * @return void
     * @throws {@link ModelConstraintException} If <var>$value</var> or
     * 				<var>$datatype</var> are <var>null</var>.
     */
    public function setValue($value, $datatype);
}