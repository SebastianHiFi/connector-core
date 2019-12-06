<?php

namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Utilities\Str;

/**
 * Class Event
 * @package Jtl\Connector\Core\Definition
 */
final class Event
{
    const BEFORE = 'before';
    const AFTER = 'after';

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param string $moment
     * @return string
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function createEventName(string $controllerName, string $actionName, string $moment): string
    {
        if(!Controller::isController($controllerName)) {
            throw DefinitionException::unknownController($controllerName);
        }

        if(!Action::isAction($actionName)) {
            throw DefinitionException::unknownAction($actionName);
        }

        if(!self::isMoment($moment)) {
            throw DefinitionException::unknownMoment($moment);
        }

        return Str::toSnakeCase(sprintf("%s.%s.%s", $controllerName, $moment, $actionName));
    }

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param string $moment
     * @return string
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function createCoreEventName(string $controllerName, string $actionName, string $moment): string
    {
        return 'core.' . self::createEventName($controllerName, $actionName, $moment);
    }

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param string $moment
     * @return string
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function createHandleEventName(string $controllerName, string $actionName, string $moment): string
    {
        return self::createEventName($controllerName, $actionName, $moment) . '.handle';
    }

    /**
     * @param string $moment
     * @return string
     * @throws DefinitionException
     */
    public static function createRpcEventName(string $moment): string
    {
        if(!self::isMoment($moment)) {
            throw DefinitionException::unknownMoment($moment);
        }

        return strtolower(sprintf("rpc.%s", $moment));
    }

    /**
     * @param string $moment
     * @return boolean
     */
    public static function isMoment(string $moment): bool
    {
        return in_array($moment, [self::BEFORE, self::AFTER]);
    }
}