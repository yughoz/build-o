<?php
	return [
		/*
		|--------------------------------------------------------------------------
		| Menu Items
		|--------------------------------------------------------------------------
		|
		| Specify your menu items to display in the left sidebar. Each menu item
		| should have a text and and a URL. You can also specify an icon from
		| Material Design. A string instead of an array represents a header in sidebar
		| layout. The 'can' is a filter on Laravel's built in Gate functionality.
		|
		*/

		'menu' => [
            [
                'title' => "User Management",
                'icon' => "fa fa-cogs",
                'modulCode' => "USER_MANAGEMENT",
                'subMenu' => [
                    [
                        'url' => "users",
                        'title' => "Akun",
                        'icon' => "fa fa-users",
                        'modulCode' => "USERS",
                    ],
                    [
                        'url' => "roles",
                        'title' => "Akses Akun",
                        'icon' => "fa fa-lock",
                        'modulCode' => "ROLES_AND_PERMISSIONS",
                    ],
                ]
            ],
            [
                'title' => "CMS",
                'icon' => "fa fa-cogs",
                'modulCode' => "CONTENT_MANAGEMENT_SYSTEM",
                'subMenu' => [
                    [
                        'url' => "service-menu",
                        'title' => "Service Menu",
                        'icon' => "fa fa-list",
                        'modulCode' => "SERVICE_MENU",
                    ],
                    [
                        'url' => "backoffice/home",
                        'title' => "Home",
                        'icon' => "fa fa-home",
                        'modulCode' => "HOME",
                    ],
                    [
                        'url' => "backoffice/transaction",
                        'title' => "Transaction",
                        'icon' => "fa fa-line-chart",
                        'modulCode' => "TRANSACTION",
                    ],
                    [
                        'url' => "backoffice/category",
                        'title' => "Category",
                        'icon' => "fa fa-sitemap",
                        'modulCode' => "CATEGORY",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_CATEGORY",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_CATEGORY",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DELETE_CATEGORY",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_TRANSACTION",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_TRANSACTION",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "CANCEL_TRANSACTION",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_SERVICE_MENU",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_SERVICE_MENU",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DELETE_SERVICE_MENU",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "PRODUCT",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_PRODUCT",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_PRODUCT",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DELETE_PRODUCT",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DELETE_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "SUB_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "ADD_SUB_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "UPDATE_SUB_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DELETE_SUB_HOME",
                    ],
                    [
                        'hide' => true,
                        'modulCode' => "DETAIL_SUB_HOME",
                    ],
                ]
            ],
        ],
        'registerSocialMedia' => false,
        'loginSocialMedia' => false,
        'canRegister' => false,
        'canForgotPassword' => false,
        'aliasNameApps' => "BuildO CMS",
        'superUserID' => 1,
	];
