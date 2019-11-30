<?php
return array (
    'name' => 'rest',
    'type' => 'application',
    'technology' => 'rest',
    'mapped_to' => 'rest',
    'storage_role' => 'root',
    'vulnerabilities' => 
    array (
        'vuln_list' => 
        array (
            'CSRF' => 
            array (
                'enabled' => true,
            ),
            'Referer' => 
            array (
                'enabled' => true,
            ),
            'XMLExternalEntity' => 
            array (
                'enabled' => true,
            ),
        ),
    ),
    'children' => 
    array (
        'user' => 
        array (
            'name' => 'user',
            'type' => 'controller',
            'technology' => 'rest',
            'mapped_to' => 'user',
            'children' => 
            array (
                'put' => 
                array (
                    'name' => 'put',
                    'type' => 'action',
                    'technology' => 'rest',
                    'mapped_to' => 'put',
                    'fields' => 
                    array (
                        0 => 
                        array (
                            'name' => 'first_name',
                            'source' => 'body',
                            'vulnerabilities' => 
                            array (
                                'vuln_list' => 
                                array (
                                    'SQL' => 
                                    array (
                                        'enabled' => true,
                                        'blind' => true,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'category' => 
        array (
            'name' => 'category',
            'type' => 'controller',
            'technology' => 'rest',
            'mapped_to' => 'category',
            'children' => 
            array (
                'get' => 
                array (
                    'name' => 'get',
                    'type' => 'action',
                    'technology' => 'rest',
                    'mapped_to' => 'get',
                    'fields' => 
                    array (
                        0 => 
                        array (
                            'name' => 'name',
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
                    ),
                ),
                'get_collection' => 
                array (
                    'name' => 'get_collection',
                    'type' => 'action',
                    'technology' => 'rest',
                    'mapped_to' => 'get_collection',
                    'fields' => 
                    array (
                        0 => 
                        array (
                            'name' => 'page',
                            'source' => 'any',
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
                            'name' => 'per_page',
                            'source' => 'any',
                            'vulnerabilities' => 
                            array (
                                'vuln_list' => 
                                array (
                                    'SQL' => 
                                    array (
                                        'enabled' => true,
                                        'blind' => true,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);