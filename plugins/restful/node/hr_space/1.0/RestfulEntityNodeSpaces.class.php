<?php

/**
 * @file
 * Contains \RestfulEntityNodeSpaces.
 */

class RestfulEntityNodeSpaces extends \RestfulEntityBaseNode {

  /**
   * Overrides RestfulEntityBaseNode::addExtraInfoToQuery()
   * 
   * Adds proper query tags
   */
  protected function addExtraInfoToQuery($query) {
    parent::addExtraInfoToQuery($query);
    $filters = $this->parseRequestForListFilter();
    if (!empty($filters)) {
      foreach ($query->tags as $i => $tag) {
        if ($tag == 'node_access') {
          unset($query->tags[$i]);
        }
      }
      $query->addTag('entity_field_access');
    }
  }

  /**
   * Overrides \RestfulEntityBase::publicFieldsInfo().
   */
  public function publicFieldsInfo() {
    $public_fields = parent::publicFieldsInfo();

    $public_fields['homepage'] = array(
      'property' => 'field_website',
      'sub_property' => 'url',
    );

    $public_fields['email'] = array(
      'property' => 'field_email',
    );

    $public_fields['category'] = array(
      'property' => 'field_space_category',
      'sub_property' => 'name',
    );

    $public_fields['organizations'] = array(
      'property' => 'field_organizations',
      'resource' => array(
        'hr_organization' => 'organizations',
      ),
      'process_callbacks' => array(array($this, 'getEntity')),
    );

    $public_fields['url'] = array(
      'property' => 'url',
    );

    return $public_fields;
  }

  protected function getEntity($wrapper) {
    foreach ($wrapper as &$item) {
      $array_item = (array)$item;
      $properties = array_keys($array_item);
      foreach ($properties as $property) {
        if (!in_array($property, array('id', 'label', 'self'))) {
          unset($array_item[$property]);
        }
      }
      $item = (object)$array_item;
    }
    return $wrapper;
  }

}