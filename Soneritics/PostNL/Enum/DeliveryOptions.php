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
namespace PostNL\Enum;

/**
 * DeliveryOptions enum package
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  30-5-2018
 */
class DeliveryOptions
{
    const DAYTIME = 'Daytime'; // Daytime delivery
    const EVENING = 'Evening'; // Evening delivery
    const MORNING = 'Morning'; // Morning delivery before 10:00
    const NOON = 'Noon'; // Morning delivery before 12:00
    const SUNDAY = 'Sunday'; // Sunday delivery
    const SAMEDAY = 'Sameday'; // Sameday delivery (must be used in combination with Evening)
    const AFTERNOON = 'Afternoon'; // Afternoon delivery before 17:00
    const MYTIME = 'MyTime';    // MyTime delivery (in Dutch: Op Afspraak Bezorgd)
}
