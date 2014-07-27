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
 * Index for type-instance relationships between {@link TopicInterface}s 
 * and for {@link TypedInterface} Topic Maps constructs.
 * 
 * This index provides access to {@link TopicInterface}s used in type-instance 
 * relationships (see http://www.isotopicmaps.org/sam/sam-model/#sect-types) or
 * as type of a {@link TypedInterface} construct.
 * Further, the retrieval of {@link AssociationInterface}s, {@link RoleInterface}s,
 * {@link OccurrenceInterface}s, and {@link NameInterface}s by their 
 * <var>type</var> property is supported.
 *
 * @package index
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface TypeInstanceIndexInterface extends IndexInterface
{
    /**
     * Returns the topics in the topic map whose type property equals one of those 
     * <var>types</var> at least. 
     * If types' length == 1, <var>$matchAll</var> is interpreted <var>true</var>.
     * 
     * Note: Implementations may return only those topics whose <var>types</var>
     * property contains the type and may ignore type-instance relationships 
     * (see {@link http://www.isotopicmaps.org/sam/sam-model/#sect-types}) which 
     * are modeled as association.
     * Further, supertype-subtype relationships (see 
     * {@link http://www.isotopicmaps.org/sam/sam-model/#sect-subtypes}) may also 
     * be ignored.
     * 
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param array An array containing the types of the {@link TopicInterface}s
     * 				to be returned.
     * @param boolean If <var>true</var>, a topic must be an instance of
     * 				all <var>types</var>, if <var>false</var> the topic must be
     * 				an instance of one type at least. If types' length == 1,
     * 				<var>$matchAll</var> is interpreted <var>true</var>.
     * @return array An array containing {@link TopicInterface}s.
     * @throws InvalidArgumentException If <var>$types</var> does not exclusively
     * 				contain {@link TopicInterface}s.
     */
    public function getTopics(array $types, $matchAll);

    /**
     * Returns the topics in the topic map which are used as type in a
     * "type-instance"-relationship.
     * 
     * Note: Implementations may return only those topics which are member
     * of the <var>types</var> property of other topics and may ignore
     * type-instance relationships (see 
     * {@link http://www.isotopicmaps.org/sam/sam-model/#sect-types}) which are
     * modeled as association.
     * Further, supertype-subtype relationships (see 
     * {@link http://www.isotopicmaps.org/sam/sam-model/#sect-subtypes}) may
     * also be ignored.
     * 
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getTopicTypes();

    /**
     * Returns the associations in the topic map whose type property equals 
     * <var>$type</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param TopicInterface The type of the {@link AssociationInterface}s to be
     * 				returned.
     * @return array An array containing {@link AssociationInterface}s.
     */
    public function getAssociations(\Phptmapi3\Core\TopicInterface $type);

    /**
     * Returns the topics in the topic map used in the type property of 
     * {@link AssociationInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getAssociationTypes();

    /**
     * Returns the roles in the topic map whose type property equals
     * <var>$type</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param TopicInterface The type of the {@link RoleInterface}s to be
     * 				returned.
     * @return array An array containing {@link RoleInterface}s.
     */
    public function getRoles(\Phptmapi3\Core\TopicInterface $type);

    /**
     * Returns the topics in the topic map used in the type property of
     * {@link RoleInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getRoleTypes();

    /**
     * Returns the topic names in the topic map whose type property equals
     * <var>$type</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param TopicInterface The type of the {@link NameInterface}s to be
     * 				returned.
     * @return array An array containing {@link NameInterface}s.
     */
    public function getNames(\Phptmapi3\Core\TopicInterface $type);

    /**
     * Returns the topics in the topic map used in the type property of
     * {@link NameInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getNameTypes();

    /**
     * Returns the occurrences in the topic map whose type property equals
     * <var>$type</var>.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @param TopicInterface The type of the {@link OccurrenceInterface}s to be 
     * 				returned.
     * @return array An array containing {@link OccurrenceInterface}s.
     */
    public function getOccurrences(\Phptmapi3\Core\TopicInterface $type);

    /**
     * Returns the topics in the topic map used in the type property of
     * {@link OccurrenceInterface}s.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing {@link TopicInterface}s.
     */
    public function getOccurrenceTypes();
}