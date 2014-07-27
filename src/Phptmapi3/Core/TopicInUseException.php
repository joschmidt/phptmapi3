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
 * Thrown when an attempt is made to remove a {@link TopicInterface} which is
 * being used as a type, as a reifier, or as a role player in an association,
 * or in a scope.
 * 
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
class TopicInUseException extends ModelConstraintException
{
    /**
     * Constructor.
     * 
     * @param TopicInterface The topic which is not removable.
     * @param string The error message.
     * @return void
     */
    public function __construct(\Phptmapi3\Core\TopicInterface $topic, $message)
    {
        parent::__construct($topic, $message);
    }
}