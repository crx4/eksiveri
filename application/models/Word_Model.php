<?php
class Word_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_chosen_words()
    {
        $query = $this->db->get('chosen_words');
        return $query->result();
    }

    function get_words()
    {
      $query = $this->db->get('words');

      return $query->result();
    }

    function add_column_to_cws($fields)
    {
        if($this->dbforge->add_column('words', $fields, 'entry_id'))
          return true;
    }

    function drop_column_from_cws($column_name)
    {
        if($this->dbforge->drop_column('words', $column_name))
          return true;
    }

    function truncate_table()
    {
        if($this->db->truncate('words'))
          return true;
    }

    function clear_words_columns()
    {
      if($this->db->empty_table('words'))
        return true;
    }

  	function count_up_word_f($word, $analysis)
  	{
      $this->db->set('count', 'count+1', FALSE);
      if($analysis === 'n')
        $this->db->set('count_n', 'count_n+1', FALSE);
      elseif($analysis === 'h')
        $this->db->set('count_h', 'count_h+1', FALSE);
      else
        $this->db->set('count_u', 'count_u+1', FALSE);
      $this->db->where('word', $word);

      if( $this->db->update( 'words_frequency' ) )
        return true;
  	}

    function insert_word_f($word, $analysis)
    {
      $data = array(
        'word' => $word,
        'count' => 1,
        'count_'.$analysis => 1
      );

      if( $this->db->insert('words_frequency', $data) )
        return true;
    }

  	function is_adready_inserted($word)
  	{
      $this->db->where('word', $word);
      $this->db->from('words_frequency');
      $count = $this->db->count_all_results();

      if ($count === 1)
        return true;
      else
        return false;
  	}
    function truncate_frequencies()
    {
      if($this->db->truncate('words_frequency'))
        return true;
    }
}
