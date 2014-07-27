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
 * Represents an occurrence item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-occurrence}.
 * 
 * Inherited method <var>getParent()</var> from {@link ConstructInterface}
 * returns the {@link TopicInterface} to which this occurrence belongs to.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface OccurrenceInterface extends
    \Phptmapi3\Core\DatatypeAwareInterface,
    \Phptmapi3\Core\TypedInterface 
{}