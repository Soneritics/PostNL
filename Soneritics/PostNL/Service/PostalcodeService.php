<?php
/* Copyright (C) Soneritics - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */

namespace PostNL\Service;

/**
 * Class PostalcodeService
 * @package PostNL\Service
 */
class PostalcodeService extends AbstractService
{
    /**
     * Get the postal code for an address
     * @param string $postalcode
     * @param int $housenumber
     * @param string|null $addition
     * @return string
     * @throws \Exception
     */
    public function getAddress(string $postalcode, int $housenumber, ?string $addition = null)
    {
        $requestVars = [
            'postalcode' => $postalcode,
            'housenumber' => $housenumber
        ];

        if (!empty($addition)) {
            $requestVars['housenumberaddition'] = $addition;
        }

        return $this->post(
            '/postalcodecheck',
            $requestVars
        );
    }
}