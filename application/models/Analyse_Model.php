<?php
class Analyse_Model extends CI_Model {

    function __construct()
    {
      // Call the Model constructor
      parent::__construct();
    }

    function insert_analyzed_entry($entry)
    {
      if($this->db->insert('startup_entries', $entry))
        return true;
      else
        return false;
    }
}
