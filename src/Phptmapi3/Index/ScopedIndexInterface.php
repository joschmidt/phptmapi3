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
 * Index for {@link ScopedInterface} statements and their scope.
 * 
 * This index provides access to {@link AssociationInterfaces}s,
 * {@link OccurrenceInterface}s, {@link NameInterface}s, and
 * {@link VariantInterfaces}s by their scope property and to
 * {@link TopicInterface}s which are used as theme in a scope.
 *
 * @package index
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface ScopedIndexInterface extends \Phptmapi3\Index\IndexInterface
{
    /**
     * Returns the {@link AssociationInterface}s in the topic map whose scope 
     * property equals one of those themes at least. 
     * If themes' length == 1, <var>$matchAll</var> is interpreted <var>true</var>.
     * If themes' length == 0, <var>$themes</var> is interpreted as the 
     * unconstrained scope.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param array The scope of the {@link AssociationInterface}s to be returned.
     * 				If <var>$themes</var> is an empty array all 
     * 				{@link AssociationInterface}s in the unconstrained scope are 
     * 				returned.
     * @param boolean If true the scope property of an association must match all 
     * 				themes, if false one theme must be matched at least. If themes' 
     * 				length == 1, <var>$matchAll</var> is interpreted true.
     * @return array An array containing {@link AssociationInterface}s.
     * @throws InvalidArgumentException If <var>$themes</var> does not exclusively 
     * 				contain {@link TopicInterface}s.
     */
    public function getAssociations(array $themes, $matchAll);

    /**
     * Returns the {@link TopicInterface}s in the topic map used in the scope 
     * property of {@link AssociationInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getAssociationThemes();

    /**
     * Returns the {@link NameInterface}s in the topic map whose scope property
     * equals one of those themes at least.
     * If themes' length == 1, <var>$matchAll</var> is interpreted <var>true</var>.
     * If themes' length == 0, <var>$themes</var> is interpreted as the 
     * unconstrained scope.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param array The scope of the {@link NameInterface}s to be returned.
     * 				If <var>$themes</var> is an empty array all {@link NameInterface}s 
     * 				in the unconstrained scope are returned.
     * @param boolean If true the scope property of a name must match all themes,
     *        if false one theme must be matched at least. If themes' length == 1,
     *        <var>$matchAll</var> is interpreted true.
     * @return array An array containing {@link NameInterface}s.
     * @throws InvalidArgumentException If <var>$themes</var> does not exclusively
     * 				contain {@link TopicInterface}s.
     */
    public function getNames(array $themes, $matchAll);

    /**
     * Returns the {@link TopicInterface}s in the topic map used in the scope 
     * property of {@link NameInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getNameThemes();

    /**
     * Returns the {@link OccurrenceInterface}s in the topic map whose scope
     * property equals one of those themes at least.
     * If themes' length == 1, <var>$matchAll</var> is interpreted <var>true</var>.
     * If themes' length == 0, <var>$themes</var> is interpreted as the
     * unconstrained scope.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param array The scope of the {@link OccurrenceInterface}s to be returned.
     * 				If <var>$themes</var> is an empty array all {@link OccurrenceInterface}s
     * 				in the unconstrained scope are returned.
     * @param boolean If true the scope property of a name must match all themes,
     *        if false one theme must be matched at least. If themes' length == 1,
     *        <var>$matchAll</var> is interpreted true.
     * @return array An array containing {@link OccurrenceInterface}s.
     * @throws InvalidArgumentException If <var>$themes</var> does not exclusively 
     * 				contain {@link TopicInterface}s.
     */
    public function getOccurrences(array $themes, $matchAll);

    /**
     * Returns the {@link TopicInterface}s in the topic map used in the scope
     * property of {@link OccurrenceInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getOccurrenceThemes();

    /**
     * Returns the {@link VariantInterface}s in the topic map whose scope property
     * equals one of those themes at least. 
     * If themes' length == 1, <var>$matchAll</var> is interpreted <var>true</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param array The scope of the {@link VariantInterface}s to be returned.
     * @param boolean If true the scope property of a name must match all themes,
     *        if false one theme must be matched at least. If themes' length == 1,
     *        <var>$matchAll</var> is interpreted true.
     * @return array An array containing {@link VariantInterface}s.
     * @throws InvalidArgumentException If <var>$themes</var> is an empty array, or
     * 				if <var>$themes</var> does not exclusively contain {@link Topic}s.
     */
    public function getVariants(array $themes, $matchAll);

    /**
     * Returns the {@link TopicInterface}s in the topic map used in the scope
     * property of {@link VariantInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getVariantThemes();
}