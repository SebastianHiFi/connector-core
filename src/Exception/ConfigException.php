<?php

namespace Jtl\Connector\Core\Exception;

class ConfigException extends \Exception
{
    public const
        EMPTY_KEY = 10,
        UNKNOWN_TYPE = 20,
        WRONG_TYPE = 30,
        UNKNOWN_OPTION = 40,
        SCHEMA_VALIDATION_ERRORS = 50;

    /**
     * @return ConfigException
     */
    public static function keyIsEmpty(): self
    {
        return new static('Key must contain at least one character', self::EMPTY_KEY);
    }

    /**
     * @param string $type
     * @return ConfigException
     */
    public static function unknownType(string $type): self
    {
        return new static(sprintf('Option type (%s) does not exist', $type), self::UNKNOWN_TYPE);
    }

    /**
     * @param string $expectedType
     * @param string $givenType
     * @return ConfigException
     */
    public static function wrongType(string $expectedType, string $givenType): self
    {
        return new static(sprintf('Wrong data type. %s was expected but %s is given', $expectedType, $givenType), self::WRONG_TYPE);
    }

    /**
     * @param string $key
     * @return ConfigException
     */
    public static function unknownOption(string $key): self
    {
        return new static(sprintf('Option (%s) does not exist', $key), self::UNKNOWN_OPTION);
    }

    /**
     * @param array $invalidValues
     * @param array $missingRequiredProperties
     * @return ConfigException
     */
    public static function schemaValidationErrors(array $invalidValues, array $missingRequiredProperties): self
    {
        $msg = 'Configuration could not get validated.';
        if(count($invalidValues) > 0) {
            $msg .= sprintf(' The properties "%s" have invalid values.', implode(', ', $invalidValues));
        }

        if(count($missingRequiredProperties) > 0) {
            $msg .= sprintf(' The required properties "%s" are missing.', implode(', ', $missingRequiredProperties));
        }

        return new static($msg, self::SCHEMA_VALIDATION_ERRORS);
    }
}
