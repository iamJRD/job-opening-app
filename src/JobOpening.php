<?php
  class JobOpening
  {
      private $title;
      private $description;
      private $contactInfo;

      function __construct($title, $description, $contactInfo)
      {
          $this->title = $title;
          $this->description = $description;
          $this->ContactInfo = $contactInfo;
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

      function setContactInfo($new_ContactInfo)
      {
          $this->ContactInfo = $new_ContactInfo;
      }
      function getContactInfo()
      {
          return $this->ContactInfo;
      }

      function saveJob()
      {
          array_push($_SESSION['list_of_jobs'], $this);
      }

      static function getAll()
      {
          return $_SESSION['list_of_jobs'];
      }
  }
?>
