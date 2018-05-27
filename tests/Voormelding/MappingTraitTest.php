<?php
/*
 * The MIT License
 *
 * Copyright 2014 Soneritics Webdevelopment.
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
require_once __DIR__ . '/TestAbstract/TestAbstract.php';

/**
 * Unit test voor de MappingTrait.
 *
 * @author Jordi Jolink
 * @since 22-4-2015
 */
class MappingTraitTest extends TestAbstract
{
    /**
     * SetUp include de nodige testclasses.
     */
    public function setUp()
    {
        parent::setUp();
        require_once __DIR__ . '/Data/EmptyMappingGeneratorExtender.php';
    }

    /**
     * Test de exceptions van de MappingTrait, via de MappingGenerator class.
     * Hiervoor wordt een testobject gebruikt met een missende property.
     * @expectedException Exception
     */
    public function testMissingMapping()
    {
        $result = (new EmptyMappingGeneratorExtender)->genereer();
        $this->assertEmpty($result);
    }

    /**
     * Test voor key == value in de mapping array.
     */
    public function testIdentifierIsGetter()
    {
        $resultGenerator = (new EmptyMappingGeneratorExtender)
            ->testFillMapping('TEST', 'TEST')
            ->genereer();

        $result = [];
        foreach ($resultGenerator as $line) {
            $result[] = $line;
        }

        $this->assertEquals(
            implode("\n", $result),
            "TEST"
        );
    }
}
