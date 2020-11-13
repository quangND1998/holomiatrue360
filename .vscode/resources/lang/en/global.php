<?php

return [
	
	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permissions',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
		],
    ],
    'action' =>'Action',
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'permission' => 'Permissions',
		],
	],
	
	'users' => [
		'title' => 'Users',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
    ],

    'projects' => [
		'title' => 'Projects',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'status' => 'Status',
			'department' => 'Department',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
    ],
    'user'=>'user',
    'project'=>'Project',
    'role' =>'Role',




    'edit_permission'=>"Permission Edit",
    'chose_permissions'=>'chose permissions',
	'app_create' => 'Create',
    'app_save' => 'Save',
    'app_cancel'=>'Cancel',
	'app_edit' => 'Edit',
	'app_view' => 'View',
	'app_update' => 'Update',
	'app_list' => 'List',
	'app_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Logout',
	'app_add_new' => 'Add new',
	'app_are_you_sure' => 'Are you sure?',
	'app_back_to_list' => 'Back to list',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Delete',
	'global_title' => 'Admin Manager',
	'language' => 'Language',
	'english' => 'English',
	'vietnamese' => 'Vietnamese'
];