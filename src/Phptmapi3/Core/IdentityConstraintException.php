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
 * This exception is used to report identity constraint violations.
 * 
 * Assigning an item identifier, a subject identifier, or a subject locator
 * to different objects causes an <var>IdentityConstraintException</var> to be
 * thrown.
 * 
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
class IdentityConstraintException extends \Phptmapi3\Core\ModelConstraintException
{
    /**
     * The {@link ConstructInterface} which already has the identity represented
     * by the locator in {@link getLocator()}.
     * 
     * @var ConstructInterface
     */ 
    private $existing;
  
    /**
     * The locator representing the identity that caused the exception.
     * 
     * @var string
     */
    private $locator;
  
    /**
     * Constructor.
     * 
     * @param ConstructInterface The construct to which the identity should
     * 				have been assigned to. In case a factory method has thrown this
     * 				exception it is the construct which provides the factory method.
     * @param ConstructInterface The construct which has the same identity.
     * @param string The locator representing the identity.
     * @param string The error message.
     * @return void
     */
    public function __construct(
      \Phptmapi3\Core\ConstructInterface $reporter,
      \Phptmapi3\Core\ConstructInterface $existing, 
      $locator, 
      $message
    ) {
        parent::__construct($reporter, $message);
        $this->existing = $existing;
        $this->locator = $locator;
    }
  
    /**
     * Returns the {@link ConstructInterface} which already has the identity
     * representedby the locator in {@link getLocator()}.
     * 
     * @return ConstructInterface The existing construct.
     */
    public function getExisting()
    {
        return $this->existing;
    }

    /**
     * Returns the locator representing the identity that caused the exception.
     * 
     * @return string The locator representing the identity that caused the
     * 				exception.
     */
    public function getLocator()
    {
        return $this->locator;
    }
}