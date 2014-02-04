<?php
/**
 * @file
 * hr_spaces.features.og_features_permission.inc
 */

/**
 * Implements hook_og_features_default_permissions().
 */
function hr_spaces_og_features_default_permissions() {
  $permissions = array();

  // Exported og permission: 'node:hr_bundle:assign editor role'
  $permissions['node:hr_bundle:assign editor role'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:hr_bundle:assign manager role'
  $permissions['node:hr_bundle:assign manager role'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:hr_space:add user'
  $permissions['node:hr_space:add user'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'manager' => 'manager',
    ),
  );

  // Exported og permission: 'node:hr_space:administer og menu'
  $permissions['node:hr_space:administer og menu'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'manager' => 'manager',
    ),
  );

  // Exported og permission: 'node:hr_space:approve and deny subscription'
  $permissions['node:hr_space:approve and deny subscription'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'manager' => 'manager',
    ),
  );

  // Exported og permission: 'node:hr_space:manage members'
  $permissions['node:hr_space:manage members'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'manager' => 'manager',
    ),
  );

  return $permissions;
}