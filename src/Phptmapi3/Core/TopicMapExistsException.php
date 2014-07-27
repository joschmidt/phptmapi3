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
 * Exception thrown when an attempt is made to create a new 
 * {@link TopicMapInterface} under a storage address (a URI) that is already
 * assigned to another {@link TopicMapInterface} in the same 
 * {@link TopicMapSystemInterface}.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
class TopicMapExistsException extends \Phptmapi3\Core\PHPTMAPIException {}