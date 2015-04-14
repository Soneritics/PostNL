<?php
/* 
 * The MIT License
 *
 * Copyright 2015 Soneritics Webdevelopment.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace PostNL\Mapping;

/**
 * Mapping trait om gemapte waarden te returnen vanuit getters.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  14-4-2015
 */
trait MappingTrait
{
    /**
     * Map de waarden op basis van de $mapping property.
     * @throw \Exception
     * @return array
     */
    protected function getMappedValues()
    {
        // Controle op aanwezigheid $mapping property.
        if (empty($this->mapping)) {
            throw new \Exception('$mapping property niet gevuld.');
        }

        // Mapping toepassen en resultaat retourneren
        $result = [];

        foreach ($this->mapping as $identifier => $getter) {
            $getterFunction = "get{$getter}";
            $value = $this->$getterFunction();

            if (!empty($value)) {
                $result[] = "{$identifier} {$value}";
            }
        }

        return $result;
    }
}