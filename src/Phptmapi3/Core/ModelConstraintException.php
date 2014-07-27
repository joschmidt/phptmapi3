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
 * This exception is used to report Topic Maps Data Model (TMDM)
 * ({@link http://www.isotopicmaps.org/sam/sam-model/}) constraint violations.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
class ModelConstraintException extends \Phptmapi3\Core\PHPTMAPIRuntimeException
{
    /**
     * The {@link ConstructInterface} which has thrown the exception.
     * 
     * @var Construct
     */
    private $reporter;

    /**
     * Constructor.
     * 
     * @param ConstructInterface The construct which should have been modified.
     * @param string The error message.
     * @return void
     */
    public function __construct(\Phptmapi3\Core\ConstructInterface $reporter, $message)
    {
        parent::__construct($message);
        $this->reporter = $reporter;
    }
  
    /**
     * Returns the {@link ConstructInterface} which has thrown the exception.
     * 
     * @return ConstructInterface The construct which has thrown the exception.
     */
    public function getReporter()
    {
        return $this->reporter;
    }
}