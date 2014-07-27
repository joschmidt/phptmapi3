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
 * Base interface for all indices.
 *
 * @package index
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
interface IndexInterface
{
    /**
     * Opens the index.
     * This method must be invoked before using any other method (aside from
     * {@link isOpen()}) exported by this interface or derived interfaces.
     * 
     * @return void
     */
    public function open();
    
    /**
     * Closes the index.
     * 
     * @return void
     */
    public function close();
    
    /**
     * Indicates if the index is open.
     * 
     * @return boolean <var>True</var> if the index is already opened, 
     * 				<var>false</var> otherwise.
     */
    public function isOpen();
    
    /**
     * Indicates whether the index is updated automatically.
     * If the value is <var>true</var> the index is automatically kept
     * synchronized with the topic map on updates.
     * If the value is <var>false</var> the {@link reindex()} method must be
     * called to resynchronize the index with the topic map.
     * 
     * @return boolean <var>True</var> if the index is updated automatically,
     * 				<var>false</var> otherwise.
     */
    public function isAutoUpdated();
    
    /**
     * Synchronizes the index with data in the topic map.
     *
     * @return void
     */
    public function reindex();
}