<?php
return array (
    'name' => 'account',
    'type' => 'controller',
    'technology' => 'web',
    'storage_role' => 'root',
    'children' => 
    array (
        'index' => 
        array (
            'name' => 'index',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
        ),
        'orders' => 
        array (
            'name' => 'orders',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'page',
                    'source' => 'query',
                ),
                1 => 
                array (
                    'name' => 'id',
                    'source' => 'query',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'XSS' => 
                            array (
                                'enabled' => false,
                                'stored' => false,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'documents' => 
        array (
            'name' => 'documents',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'page',
                    'source' => 'query',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'OSCommand' => 
                            array (
                                'enabled' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'help_articles' => 
        array (
            'name' => 'help_articles',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'page',
                    'source' => 'query',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'RemoteFileInclude' => 
                            array (
                                'enabled' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'edit_profile' => 
        array (
            'name' => 'edit_profile',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
            'fields' => 
            array (
                0 => 
                array (
                    'name' => 'email',
                    'source' => 'any',
                    'vulnerabilities' => 
                    array (
                        'children' => 
                        array (
                            0 => 
                            array (
                            ),
                        ),
                    ),
                ),
                1 => 
                array (
                    'name' => 'first_name',
                    'source' => 'any',
                ),
                2 => 
                array (
                    'name' => 'return_url',
                    'source' => 'any',
                    'vulnerabilities' => 
                    array (
                        'children' => 
                        array (
                            0 => 
                            array (
                                'name' => 'nbmbnmbnm',
                            ),
                            1 => 
                            array (
                                'name' => '477547457',
                            ),
                            2 => 
                            array (
                                'name' => 'bnmbn',
                            ),
                            3 => 
                            array (
                                'name' => 'bmbnm',
                            ),
                        ),
                    ),
                ),
                3 => 
                array (
                    'name' => 'last_name',
                    'source' => 'any',
                ),
                4 => 
                array (
                    'name' => 'password_confirmation',
                    'source' => 'any',
                ),
                5 => 
                array (
                    'name' => 'password',
                    'source' => 'any',
                ),
                6 => 
                array (
                    'name' => 'username',
                    'source' => 'any',
                    'vulnerabilities' => 
                    array (
                        'vuln_list' => 
                        array (
                            'SQL' => 
                            array (
                                'enabled' => true,
                                'blind' => false,
                            ),
                            'XSS' => 
                            array (
                                'enabled' => true,
                                'stored' => true,
                            ),
                        ),
                    ),
                ),
                7 => 
                array (
                    'name' => 'user_phone',
                    'source' => 'any',
                ),
                8 => 
                array (
                    'name' => 'page',
                    'source' => 'any',
                ),
                9 => 
                array (
                    'name' => 'photo',
                    'source' => 'any',
                    'vulnerabilities' => 
                    array (
                        'name' => 'parent_vulns',
                        'vuln_list' => 
                        array (
                            'ArbitraryFileUpload' => 
                            array (
                                'enabled' => true,
                            ),
                        ),
                        'children' => 
                        array (
                            0 => 
                            array (
                                'name' => 'child_vulns',
                                'conditions' => 
                                array (
                                    'IsAjax' => true,
                                    'Method' => 
                                    array (
                                        'methods' => 
                                        array (
                                            0 => 'GET',
                                            1 => 'POST',
                                            2 => 'OPTIONS',
                                        ),
                                    ),
                                ),
                                'vuln_list' => 
                                array (
                                    'ArbitraryFileUpload' => 
                                    array (
                                        'enabled' => false,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'add_photo' => 
        array (
            'name' => 'add_photo',
            'type' => 'action',
            'technology' => 'generic',
            'storage_role' => 'child',
        ),
    ),
);