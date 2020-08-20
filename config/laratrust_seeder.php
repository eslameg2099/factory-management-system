<?php

return [
    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'qclis'=> 'c,r,u,d',
            'conteners'=> 'c,r,u,d',
            'extras'=> 'c,r,u,d',
            'employes'=> 'c,r,u,d',
            'materials'=> 'c,r,u,d',
            'salaries'=> 'c,r,u,d',
            'shafts'=> 'c,r,u,d' ,


             


            
        ],
        'admin' => []
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
