<?php
return array (
    'name' => 'contact',
    'type' => 'controller',
    'technology' => 'web',
    'storage_role' => 'root',
    'vulnerabilities' => 
    array (
        'vuln_list' => 
        array (
            'CSRF' => 
            array (
                'enabled' => true,
            ),
        ),
    ),
    'children' => 
    array (
        'index' => 
        array (
            'name' => 'index',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'contact_name',
                    'source' => 'body',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'SQL' => 
                            array (
                                'enabled' => true,
                                'blind' => false,
                            ),
                        ),
                    ),
                ),
                1 => 
                array (
                    'name' => 'contact_email',
                    'source' => 'body',
                ),
                2 => 
                array (
                    'name' => 'contact_phone',
                    'source' => 'body',
                ),
                3 => 
                array (
                    'name' => 'contact_message',
                    'source' => 'body',
                ),
            ),
        ),
    ),
);