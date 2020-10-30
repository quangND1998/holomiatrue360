<?php

return [
	
	'user-management' => [
		'title' => 'Quản lý người dùng',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	

	'permissions' => [
		'title' => 'Danh sách quyền',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'TÊN QUYỀN',
		],
	],

	'roles' => [
		'title' => 'Phân quyền',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'TÊN PHÂN QUYỀN',
			'permission' => 'Permissions',
		],
	],
	
	'users' => [
		'title' => 'Danh sách nhân viên',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'TÊN NHÂN VIÊN',
			'email' => 'EMAIL',
			'password' => 'Password',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
	],
	'edit_permission'=>"Chỉnh sửa quyền",
	'app_create' => 'Thêm',
    'app_save' => 'Lưu lại',
    'app_cancel'=>"Hủy",
	'app_edit' => 'Sửa',
	'app_view' => 'Xem',
	'app_update' => 'Cập nhật',
	'app_list' => 'List',
	'app_no_entries_in_table' => 'Không có mục nào trong bảng.',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Đăng Xuất',
	'app_add_new' => 'Thêm mới',
	'app_are_you_sure' => 'Bạn chắn chắn ?',
	'app_back_to_list' => 'Quay lại danh sách',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Xóa',
	'global_title' => 'Admin Manager',
];