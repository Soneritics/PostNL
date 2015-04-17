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
namespace PostNL\Data;

/**
 * Productcode class. Bevat constanten voor de productcodes die gebruikt kunenn worden binnen
 * de Pakket-class om productcodes mee aan te duiden.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  17-4-2015
 */
class Productcode
{
    const STANDAARD_VERZENDING = '03085';
    const REMBOURS = '03086';
    const VERHOOGD_AANSPRAKELIJK = '03087';
    const HANDTEKENING_ONTVANGST_ALLEEN_HUISADRES = '03089';
    const BURENLEVERING_RETOUR_BIJ_GEEN_GEHOOR = '03090';
    const REMBOURS_VERHOOGD_AANSPRAKELIJK = '03091';
    const REMBOURS_RETOUR_BIJ_GEEN_GEHOOR = '03093';
    const VERHOOGD_AANSPRAKELIJK_RETOUR_BIJ_GEEN_GEHOOR = '03094';
    const HANDTEKENING_ONTVANGST_ALLEEN_HUISADRES_RETOUR_BIJ_GEEN_GEHOOR = '03096';
    const REMBOURS_VERHOOGD_AANSPRAKELIJK_RETOUR_BIJ_GEEN_GEHOOR = '03097';
    const HANDTEKENING_VOOR_ONTVANGST = '03189';
    const ALLEEN_HUISADRES = '03385';
    const HANDTEKENING_VOOR_ONTVANGST_RETOUR_BIJ_GEEN_GEHOOR = '03389';
    const ALLEEN_HUISADRES_RETOUR_BIJ_GEEN_GEHOOR = '03390';
}
