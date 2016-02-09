<?php
  class ContactInfo
  {
      private $contact_name;
      private $contact_email;
      private $phone_number;

      function __construct($contact_name, $contact_email, $phone_number)
      {
          $this->contact_name = $contact_name;
          $this->contact_email = $contact_email;
          $this->phone_number = $phone_number;
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

      function setPhoneNumber($new_phone_number)
      {
          $this->phone_number = $new_phone_number;
      }
      function getPhoneNumber()
      {
          return $this->phone_number;
      }
  }
?>
