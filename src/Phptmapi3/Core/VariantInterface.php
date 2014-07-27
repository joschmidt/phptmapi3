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
 * Represents a variant item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-variant}.
 * 
 * Inherited method <var>getParent()</var> from {@link ConstructInterface}
 * returns the {@link NameInterface} to which this variant belongs to.
 * Inherited method <var>getScope()</var> from {@link ScopedInterface} returns
 * the union of its own scope and the parent's scope.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface VariantInterface extends \Phptmapi3\Core\DatatypeAwareInterface {}