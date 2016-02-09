<?php
  class JobOpening
  {
      private $title;
      private $description;
      private $contact_name;
      private $contact_email;

      function __construct ($title, $description, $contact_name, $contact_email)
      {
          $this->title = $title;
          $this->description = $description;
          $this->contact_name = $contact_name;
          $this->contact_email = $contact_email;
      }

      function setTitle($new_title)
      {
          $this->title = $new_title;
      }
      function getTitle()
      {
          return $this->title;
      }

      function setDescription($new_description)
      {
          $this->description = $new_description;
      }
      function getDescription()
      {
          return $this->description;
      }

      function setContactName($new_contact_name)
      {
          $this->contact_name = $new_contact_name;
      }
      function getContactName()
      {
          return $this->contact_name;
      }

      function setContactEmail($new_contact_email)
      {
          $this->contact_email = $new_contact_email;
      }
      function getContactEmail()
      {
          return $this->contact_email;
      }

  }
 ?>
