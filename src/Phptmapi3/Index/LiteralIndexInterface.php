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

namespace Phptmapi3\Index;

/**
 * Index for literal values stored in a topic map.
 *
 * @package index
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface LiteralIndexInterface extends \Phptmapi3\Index\IndexInterface
{
    /**
     * Retrieves the topic names in the topic map which have a value equal to
     * <var>$value</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param string The value of the {@link NameInterface}s to be returned.
     * @return array An array containing {@link NameInterface}s.
     * @throws InvalidArgumentException If the value is <var>null</var>.
     */
    public function getNames($value);
    
    /**
     * Returns the {@link OccurrenceInterface}s in the topic map whose value
     * property matches <var>$value</var> and whose datatye is <var>$datatype</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param string The value of the {@link OccurrenceInterface}s to be returned.
     * @param string A URI indicating the datatype of the {@link OccurrenceInterface}s.
     *        E.g. http://www.w3.org/2001/XMLSchema#string indicates a string value.
     * @return array An array containing {@link OccurrenceInterface}s.
     * @throws InvalidArgumentException If the value or datatype is <var>null</var>.
     */
    public function getOccurrences($value, $datatype);
    
    /**
     * Returns the {@link VariantInterface}s in the topic map whose value property
     * matches <var>$value</var> and whose datatye is <var>$datatype</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param string The value of the {@link VariantInterface}s to be returned.
     * @param string A URI indicating the datatype of the {@link VariantInterface}s.
     *        E.g. http://www.w3.org/2001/XMLSchema#string indicates a string value.
     * @return array An array containing {@link VariantInterface}s.
     * @throws InvalidArgumentException If the value or datatype is <var>null</var>.
     */
    public function getVariants($value, $datatype);
}