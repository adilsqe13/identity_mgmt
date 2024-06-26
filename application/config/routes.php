<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'UserLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Admin Routes
$route['admin'] = 'AdminLogin';
$route['admin/dashboard'] = 'Admin/Dashboard';
$route['admin/dashboard/change-password'] = 'Admin/ChangePassword';
$route['admin/user-management'] = 'Admin/UserManagement';
$route['admin/user-management/add_user'] = 'Admin/AddUser';
$route['admin/user-management/edit_user'] = 'Admin/EditUser';
$route['admin/user-management/edit_user_profile'] = 'Admin/EditUserProfile';
$route['admin/user-management/user_profile'] = 'Admin/UserProfile';
$route['admin/notification-management'] = 'Admin/NotificationManagement';
$route['admin/user-log-management'] = 'Admin/UserLogManagement';
$route['admin/activity-management'] = 'Admin/ActivityManagement';

// User Routes
$route['signup'] = 'UserSignup';
$route['login'] = 'UserLogin';
$route['dashboard'] = 'User/Dashboard';
$route['dashboard/change-password'] = 'User/ChangePassword';
$route['forgot-password'] = 'User/ForgotPassword';
$route['reset-password'] = 'User/ResetPassword';
$route['dashboard/profile'] = 'User/Profile';
$route['dashboard/profile/edit_profile'] = 'User/Edit_profile';
$route['dashboard/task-manager'] = 'User/TaskManager';
$route['dashboard/task-manager/add-task'] = 'User/AddTask';
$route['dashboard/task-manager/archive-task'] = 'User/ArchiveTask';
$route['dashboard/picture-dump'] = 'User/PictureDump';




