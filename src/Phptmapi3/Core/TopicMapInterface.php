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
 * Represents a topic map item.
 * 
 * See {@link http://www.isotopicmaps.org/sam/sam-model/#d0e657}.
 *
 * Inherited method <var>getParent()</var> from {@link ConstructInterface}
 * returns <var>null</var>.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface TopicMapInterface extends \Phptmapi3\Core\ReifiableInterface
{
    /**
     * Returns the storage address that is defined in
     * {@link TopicMapSystemInterface::createTopicMap()}.
     * 
     * @return string A URI which is the storage address of the
     * 				{@link TopicMapInterface}.
     */
    public function getLocator();
    
    /**
     * Returns all {@link TopicInterface}s contained in this topic map.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing a set of {@link TopicInterface}s.
     */
    public function getTopics();
    
    /**
     * Returns all {@link AssociationInterface}s contained in this topic map.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing a set of {@link AssociationInterface}s.
     */
    public function getAssociations();
    
    /**
     * Returns a topic by its subject identifier.
     * If no topic with the specified subject identifier exists, this method
     * returns <var>null</var>.
     * 
     * @param string The subject identifier of the topic to be returned.
     * @return TopicInterface|null A topic with the specified subject
     * 				identifier or <var>null</var> if no such topic exists in the
     * 				topic map.
     */
    public function getTopicBySubjectIdentifier($subjectIdentifier);
    
    /**
     * Returns a topic by its subject locator.
     * If no topic with the specified subject locator exists, this method
     * returns <var>null</var>.
     * 
     * @param string The subject locator of the topic to be returned.
     * @return TopicInterface|null A topic with the specified subject locator
     * 				or <var>null</var> if no such topic exists in the topic map.
     */
    public function getTopicBySubjectLocator($subjectLocator);
    
    /**
     * Returns a {@link ConstructInterface} by its item identifier.
     * If no construct with the specified item identifier exists, this method
     * returns <var>null</var>.
     * 
     * @param string The item identifier of the construct to be returned.
     * @return ConstructInterface|null A construct with the specified item
     * 				identifier or <var>null</var> if no such construct exists in
     * 				the topic map.
     */
    public function getConstructByItemIdentifier($itemIdentifier);
    
    /**
     * Returns a {@link ConstructInterface} by its (system specific) identifier.
     * If no construct with the specified identifier exists, this method
     * returns <var>null</var>.
     * 
     * @param string The identifier of the construct to be returned.
     * @return ConstructInterface|null The construct with the specified id or
     * 				<var>null</var> if such a construct is unknown.
     */
    public function getConstructById($id);
    
    /**
     * Creates an {@link AssociationInterface} in this topic map with the
     * specified <var>type</var> and <var>scope</var>.
     * 
     * @param TopicInterface The association type.
     * @param array An array containing {@link TopicInterface}s - each
     * 				representing a theme. If the array's length is 0 (default),
     * 				the association will be in the unconstrained scope.
    * @return AssociationInterface The newly created
    * 				{@link AssociationInterface}.
    * @throws {@link ModelConstraintException} If <var>$type</var> or a theme
    * 				does not belong to this topic map.
    */
    public function createAssociation(
        \Phptmapi3\Core\TopicInterface $type,
        array $scope=array()
    );
    
    /**
     * Returns a {@link TopicInterface} instance with the specified item
     * identifier.
     * This method returns either an existing {@link TopicInterface} or creates
     * a new {@link TopicInterface} instance with the specified item identifier.
     * 
     * If a topic with the specified item identifier exists in the topic map,
     * that topic is returned. If a topic with a subject identifier equals to
     * the specified item identifier exists, the specified item identifier
     * is added to that topic and the topic is returned.
     * If neither a topic with the specified item identifier nor with a
     * subject identifier equals to the subject identifier exists, a topic with
     * the item identifier is created.
     * 
     * @param string The item identifier the topic should contain; must not be
     * 				<var>null</var>.
     * @return TopicInterface A {@link TopicInterface} instance with the
     * 				specified item identifier.
     * @throws {@link ModelConstraintException} If the item identifier is
     * 				<var>null</var>.
     * @throws {@link IdentityConstraintException} If another
     * 				{@link ConstructInterface} with the specified item identifier
     * 				exists which is not a {@link TopicInterface}.
     */
    public function createTopicByItemIdentifier($itemIdentifier);
    
    /**
     * Returns a {@link TopicInterface} instance with the specified subject
     * identifier.
     * This method returns either an existing {@link TopicInterface} or creates
     * a new {@link TopicInterface} instance with the specified subject
     * identifier.
     * 
     * If a topic with the specified subject identifier exists in the topic map,
     * that topic is returned. If a topic with an item identifier equals to
     * the specified subject identifier exists, the specified subject
     * identifier is added to that topic and the topic is returned. If neither
     * a topic with the specified subject identifier nor with an item
     * identifier equals to the subject identifier exists, a topic with the
     * subject identifier is created.
     * 
     * @param string The subject identifier the topic should contain; must not
     * 				be <var>null</var>.
     * @return TopicInterface A {@link TopicInterface} instance with the
     * 				specified subject identifier.
     * @throws {@link ModelConstraintException} If the subject identifier is
     * 				<var>null</var>.
     */
    public function createTopicBySubjectIdentifier($subjectIdentifier);
    
    /**
     * Returns a {@link TopicInterface} instance with the specified subject
     * locator.
     * This method returns either an existing {@link TopicInterface} or creates
     * a new {@link TopicInterface} instance with the specified subject locator.
     * 
     * @param string The subject locator the topic should contain; must not be
     * 				<var>null</var>.
     * @return TopicInterface A {@link TopicInterface} instance with the
     * 				specified subject locator.
     * @throws {@link ModelConstraintException} If the subject locator is
     * 				<var>null</var>.
     */
    public function createTopicBySubjectLocator($subjectLocator);
    
    /**
     * Returns a {@link TopicInterface} instance with an automatically
     * generated item identifier.
     * 
     * This method returns never an existing {@link TopicInterface} but creates
     * a new one with an automatically generated item identifier.
     * How that item identifier is generated depends on the implementation.
     * 
     * @return TopicInterface The newly created {@link TopicInterface} instance
     * 				with an automatically generated item identifier.
     */
    public function createTopic();
    
    /**
     * Merges the topic map <var>$other</var> into this topic map.
     * 
     * All {@link TopicInterface}s and {@link AssociationInterface}s and all of
     * their contents in <var>$other</var> will be added to this topic map.
     * 
     * All information items in <var>$other</var> will be merged into this 
     * topic map as defined by the Topic Maps Data Model (TMDM) merging rules.
     * See {@link http://www.isotopicmaps.org/sam/sam-model/#sect-merging}.
     * 
     * The merge process will not modify <var>$other</var> in any way.
     * 
     * If <var>$this->equals($other)</var> no changes are made to the topic map.
     * 
     * @param TopicMapInterface The topic map to be merged with this topic map
     * 				instance.
     * @return void
     */
    public function mergeIn(\Phptmapi3\Core\TopicMapInterface $other);
    
    /**
     * Returns the specified index.
     * 
     * @param string The class name of the index.
     * @return IndexInterface An index.
     * @throws {@link FeatureNotSupportedException} If the implementation does
     * 				not support indices, if the specified index is unsupported, or if
     * 				the specified index does not exist.
     */
    public function getIndex($className);
    
    /**
     * Closes use of this topic map instance.
     * This method should be invoked by the application once it has finished
     * using this topic map instance.
     * Implementations may release any resources required for the topic map
     * instance or any of the {@link ConstructInterface} instances contained by
     * this instance.
     * 
     * @return void
     */
    public function close();
}