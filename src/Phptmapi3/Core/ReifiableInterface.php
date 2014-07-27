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
 * Indicates that a {@link ConstructInterface} is reifiable.
 * 
 * Every Topic Maps construct that is not a {@link TopicInterface} is reifiable.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface ReifiableInterface extends \Phptmapi3\Core\ConstructInterface
{
    /**
     * Returns the reifier of this {@link ConstructInterface}.
     * 
     * @return TopicInterface|null The topic that reifies this construct or
     * 				<var>null</var> if this construct is not reified.
     */       
    public function getReifier();

    /**
     * Sets the reifier of this {@link ConstructInterface}.
     * The specified reifier MUST NOT reify another information item.
     * 
     * @param TopicInterface The topic that should reify this construct or 
     * 				<var>null</var> if an existing reifier should be removed. Default 
     * 				<var>null</var>.
     * @return void
     * @throws {@link ModelConstraintException} If the specified reifier reifies
     * 				another construct or if <var>$reifier</var> does not belong to the
     * 				parent topic map.
     */
    public function setReifier(\Phptmapi3\Core\TopicInterface $reifier=null);
}