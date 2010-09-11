<?php
/**
 * This file is part of libomb
 *
 * PHP version 5
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OMB
 * @author  Adrian Lang <mail@adrianlang.de>
 * @license http://www.gnu.org/licenses/agpl.html GNU AGPL 3.0
 * @version 0.1a-20090828
 * @link    http://adrianlang.de/libomb
 */

/**
 * Exception stating that a passed parameter is invalid
 *
 * This exception is raised when a parameter does not obey the OMB standard.
 */
class OMB_InvalidParameterException extends Exception
{
    /**
     * Constructor
     *
     * Creates a new exception based on a parameter name, value, and object
     * type.
     *
     * @param string $value     The wrong value passed
     * @param string $type      The object type the parameter belongs to;
     *                          Currently OMB uses profiles and notices
     * @param string $parameter The name of the parameter the wrong value has
     *                          been passed for
     */
    public function __construct($value, $type, $parameter)
    {
        parent::__construct("Invalid value ‘${value}’ for parameter " .
                            "‘${parameter}’ in $type");
    }
}
?>
