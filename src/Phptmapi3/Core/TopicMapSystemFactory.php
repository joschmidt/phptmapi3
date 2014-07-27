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
 * This factory class provides access to a PHPTMAPI system.
 * 
 * A new {@link TopicMapSystemInterface} instance is created by invoking the
 * {@link newTopicMapSystem()} method. 
 * Configuration properties for the new {@link TopicMapSystemInterface} instance
 * can be set by calling the {@link setFeature()} and / or {@link setProperty()}
 * methods prior to invoking {@link newTopicMapSystem()}.
 *
 * @package core
 * @author Johannes Schmidt <phptmapi-discuss@lists.sourceforge.net>
 */
abstract class TopicMapSystemFactory
{   
    /**
     * Returns the particular feature requested for in the underlying
     * implementation of {@link TopicMapSystemInterface}.
     * 
     * @param string The name of the feature to check.
     * @return boolean <var>True</var> if the named feature is enabled for
     * 				{@link TopicMapSystemInterface} instances created by this
     * 				factory; <var>false</var> if the named feature is disabled for
     * 				{@link TopicMapSystemInterface} instances created by this
     * 				factory.
     * @throws {@link FeatureNotRecognizedException} If the underlying
     * 				implementation does not recognize the named feature.
     */
    abstract public function getFeature($featureName);
    
    /**
     * Sets a particular feature in the underlying implementation of
     * {@link TopicMapSystemInterface}.
     * A list of the core features can be found at
     * {@link http://tmapi.org/features/}.
     * 
     * @param string The name of the feature to be set.
     * @param boolean <var>True</var> to enable the feature, <var>false</var>
     * 				to disable it.
     * @return void
     * @throws {@link FeatureNotRecognizedException} If the underlying
     * 				implementation does not recognize the named feature.
     * @throws {@link FeatureNotSupportedException} If the underlying
     * 				implementation recognizes the named feature but does not support
     * 				enabling or disabling it (as specified by the <var>$enable</var>
     * 				parameter).
     */
    abstract public function setFeature($featureName, $enable);
    
    /**
     * Returns if the particular feature is supported by the
     * {@link TopicMapSystemInterface}.
     * Opposite to {@link getFeature()} this method returns if the requested
     * feature is generally available / supported by the underlying
     * {@link TopicMapSystemInterface} and does not return the state
     * (enabled / disabled) of the feature.
     * 
     * @param string The name of the feature to check.
     * @return boolean <var>True</var> if the requested feature is supported,
     * 				otherwise <var>false</var>.
     */
    abstract public function hasFeature($featureName);
    
    /**
     * Gets the value of a property in the underlying implementation of
     * {@link TopicMapSystemInterface}.
     * A list of the core properties defined by TMAPI can be found at
     * {@link http://tmapi.org/properties/}.
     * An implementation is free to support properties other than the core ones.
     * 
     * @param string The name of the property to retrieve.
     * @return mixed The value set for this property or <var>null</var>
     * 				if no value is set.
     */
    abstract public function getProperty($propertyName);
    
    /**
     * Sets a property in the underlying implementation of
     * {@link TopicMapSystemInterface}.
     * A list of the core properties defined by TMAPI can be found at
     * {@link http://tmapi.org/properties/}.
     * An implementation is free to support properties other than the core
     * ones.
     * 
     * @param string The name of the property to be set.
     * @param mixed The value to be set of this property or <var>null</var> to
     * 				remove the property from the current factory configuration.
     * @return void
     */
    abstract public function setProperty($propertyName, $value);
    
    /**
     * Obtains a new instance of TopicMapSystemFactory.
     * Once an application has obtained a reference to a TopicMapSystemFactory
     * it can use the factory to configure and obtain
     * {@link TopicMapSystemInterface} instances.
     * 
     * @return TopicMapSystemFactory
     * @throws {@link FactoryConfigurationException} If the provided
     * 				implementation of TopicMapSystemFactory is not an instance of
     * 				TopicMapSystemFactory.
     * @static
     */
    public static function newInstance()
    {
        $factoryImplementationClassName = self::getImplementationClassName();
        $factoryImplementation = call_user_func(
            array($factoryImplementationClassName, 'newInstance')
        );
        if (!$factoryImplementation instanceof \Phptmapi3\Core\TopicMapSystemFactory) {
            throw new \Phptmapi3\Core\FactoryConfigurationException(
                'The provided implementation is not an instance of TopicMapSystemFactory!'
            );
        }
        return $factoryImplementation;
    }
    
    /**
     * Creates a new {@link TopicMapSystemInterface} instance using the
     * currently configured factory parameters.
     * 
     * @return TopicMapSystemInterface
     * @throws {@link PHPTMAPIException} If a <var>TopicMapSystem</var> cannot
     * 				be created which satisfies the requested configuration.
     */
    abstract public function newTopicMapSystem();
    
    /**
     * Returns the class name of the TopicMapSystemFactory implementation as
     * defined in the PHPTMAPI configuration file
     * <var>Phptmapi3/config.php</var>.
     * 
     * @return string The class name of the TopicMapSystemFactory
     * 				implementation.
     * @static
     */
    private static function getImplementationClassName()
    {
        $factoryImplementation = null;
        require(
            dirname(__FILE__) . 
            DIRECTORY_SEPARATOR . 
            '..' . 
            DIRECTORY_SEPARATOR . 
            'config.php'
        );
        return $factoryImplementation;
    }
}