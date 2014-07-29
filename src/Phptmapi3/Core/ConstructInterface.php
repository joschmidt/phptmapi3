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
 * Base interface for all Topic Maps constructs.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface ConstructInterface
{    
    /**
     * Returns the parent of this construct.
     * See the derived constructs for the particular return value.
     * This method returns <var>null</var> iff this construct is a
     * {@link TopicMapInterface} instance.
     * 
     * @return ConstructInterface|null The parent of this construct or 
     * 				<var>null</var> iff the construct is an instance of 
     * 				{@link TopicMapInterface}.
     */
    public function getParent();

    /**
     * Returns the {@link TopicMapInterface} instance to which this Topic Maps
     * construct belongs to.
     * A {@link TopicMapInterface} instance returns itself.
     * 
     * @return TopicMapInterface The topic map instance to which this construct
     * 				belongs to.
     */
    public function getTopicMap();

    /**
     * Returns the identifier of this construct.
     * This property has no representation in the Topic Maps Data Model (TMDM).
     * The ID can be anything, as long as no other {@link ConstructInterface} in
     * the same topic map has the same ID.
     * 
     * @return string An identifier which identifies this construct uniquely
     * 				within a topic map.
     */
    public function getId();

    /**
     * Returns the item identifiers of this Topic Maps construct.
     * The return value may be an empty array but must never be <var>null</var>.
     * 
     * @return array An array containing a set of URIs representing the item 
     * 				identifiers.
     */
    public function getItemIdentifiers();

    /**
     * Adds an item identifier.
     * It is not allowed to have two {@link ConstructInterface}s in the same
     * {@link TopicMapInterface} with the same item identifier.
     * If the two objects are {@link TopicInterface}s, then they must be merged.
     * If at least one of the two objects is not a {@link TopicInterface}, an
     * {@link IdentityConstraintException} must be reported.
     * 
     * @param string The item identifier to be added; must not be <var>null</var>.
     * @return void
     * @throws {@link IdentityConstraintException} If another construct has an
     * 				item identifier which is equal to <var>$itemIdentifier</var>.
     * @throws {@link ModelConstraintException} If the item identifier is
     * 				<var>null</var>.
     */
    public function addItemIdentifier($itemIdentifier);

    /**
     * Removes an item identifier.
     * 
     * @param string The item identifier to be removed from this construct,
     * 				if present (<var>null</var> is ignored).
     * @return void
     */
    public function removeItemIdentifier($itemIdentifier);

    /**
     * Removes this construct from its parent container.
     * Iff this construct is an instance of {@link TopicInterface} this method
     * throws a {@link TopicInUseException} if the topic plays a 
     * {@link RoleInterface}, is used as type of a {@link TypedInterface}
     * construct, or if it is used as theme for a {@link ScopedInterface} 
     * construct, or if it reifies a {@link ReifiableInterface}.
     * 
     * After invocation of this method, the construct is in an undefined state
     * and MUST NOT be used further.
     * 
     * @return void
     */
    public function remove();

    /**
     * Returns <var>true</var> if the other construct is equal to this one,
     * <var>false</var> otherwise.
     * Equality must be the result of comparing the IDs of the two constructs.
     * 
     * Note: This equality test does not reflect any equality rule according
     * to the Topic Maps Data Model (TMDM) by intention.
     * 
     * @param ConstructInterface The construct to compare this construct against.
     * @return boolean
     */
    public function equals(\Phptmapi3\Core\ConstructInterface $other);

    /**
     * Returns a hash code value.
     * The returned hash code is equal to the MD5 hash code of the {@link getId()}
     * property.
     * 
     * @return string
     */
    public function hashCode();
}