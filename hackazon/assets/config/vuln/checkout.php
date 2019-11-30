<?php
return array (
    'name' => 'checkout',
    'type' => 'controller',
    'technology' => 'generic',
    'storage_role' => 'root',
    'fields' => 
    array (
        0 => 
        array (
            'name' => 'fullName',
            'source' => 'any',
            'vulnerabilities' => 
            array (
                'vuln_list' => 
                array (
                    'XSS' => 
                    array (
                        'enabled' => false,
                        'stored' => true,
                    ),
                ),
            ),
        ),
        1 => 
        array (
            'name' => 'addressLine1',
            'source' => 'any',
        ),
        2 => 
        array (
            'name' => 'addressLine2',
            'source' => 'any',
        ),
        3 => 
        array (
            'name' => 'city',
            'source' => 'any',
        ),
        4 => 
        array (
            'name' => 'region',
            'source' => 'any',
        ),
        5 => 
        array (
            'name' => 'zip',
            'source' => 'any',
        ),
        6 => 
        array (
            'name' => 'country_id',
            'source' => 'any',
        ),
        7 => 
        array (
            'name' => 'phone',
            'source' => 'any',
        ),
    ),
    'children' => 
    array (
        'shipping' => 
        array (
            'name' => 'shipping',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'addressLine1',
                    'source' => 'body',
                    'vulnerabilities' => 
                    array (
                        'name' => 'addressLineVuln',
                        'vuln_list' => 
                        array (
                            'SQL' => 
                            array (
                                'enabled' => false,
                                'blind' => false,
                            ),
                        ),
                    ),
                ),
                1 => 
                array (
                    'name' => 'fullName',
                    'source' => 'body',
                ),
                2 => 
                array (
                    'name' => 'address_id',
                    'source' => 'body',
                ),
                3 => 
                array (
                    'name' => 'full_form',
                    'source' => 'body',
                ),
            ),
        ),
        'billing' => 
        array (
            'name' => 'billing',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'addressLine2',
                    'source' => 'body',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'SQL' => 
                            array (
                                'enabled' => false,
                                'blind' => false,
                            ),
                        ),
                    ),
                ),
                1 => 
                array (
                    'name' => 'address_id',
                    'source' => 'body',
                ),
                2 => 
                array (
                    'name' => 'full_form',
                    'source' => 'body',
                ),
            ),
        ),
        'getAddress' => 
        array (
            'name' => 'getAddress',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'address_id',
                    'source' => 'any',
                ),
            ),
        ),
        'deleteAddress' => 
        array (
            'name' => 'deleteAddress',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'address_id',
                    'source' => 'body',
                ),
            ),
        ),
        'placeOrder' => 
        array (
            'name' => 'placeOrder',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
        ),
        'confirmation' => 
        array (
            'name' => 'confirmation',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
        ),
        'order' => 
        array (
            'name' => 'order',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
        ),
    ),
);