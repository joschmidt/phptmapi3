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
 * Exception thrown when the underlying implementation cannot support enabling
 * or disabling a recognized feature. If the feature name is not recognized,
 * implementations MUST throw a {@link FeatureNotRecognizedException} rather
 * than a FeatureNotSupportedException.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
class FeatureNotSupportedException extends \Phptmapi3\Core\FactoryConfigurationException {}