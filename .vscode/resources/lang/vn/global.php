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
			'name' => 'Tên quyền',
		],
	],

	'roles' => [
		'title' => 'Phân quyền',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Tên phân quyền',
			'permission' => 'Danh sách quyền',
		],
	],
	
	'users' => [
		'title' => 'Danh sách người dùng',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Tên người dùng',
			'email' => 'Email',
			'password' => 'Mật khẩu',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
    ],

    'projects' => [
		'title' => 'Danh sách dự án',
		'created_at' => 'Thời gian tạo',
		'fields' => [
			'name' => 'Tên dự án',
			'status' => 'Trạng thái',
			'department' => 'Bộ phận',
			'remember-token' => 'Remember token',
		],
    ],
    'user'=>"Người dùng",
    'project'=>'Dự án',
    'role' =>'Quyền',


    'chose_permission'=>"Chọn quyền ",
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
	'app_are_you_sure' => 'Bạn chắc chắn ?',
	'app_back_to_list' => 'Quay lại danh sách',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Xóa',
	'global_title' => 'Admin Manager',
	'language' => 'Ngôn ngữ',
	'english' => 'Tiếng Anh',
	'vietnamese' => 'Tiếng Việt'
];