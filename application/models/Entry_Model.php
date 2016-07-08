<?php
class Entry_Model extends CI_Model {

    function __construct()
    {
      // Call the Model constructor
      parent::__construct();
    }

    function get_chosen_entries()
    {
      $this->db->select('id, content_text, length, analysis');
      $query = $this->db->get('training_set_chosen');
      return $query->result();
    }

    function fill_words_table($data)
    {
      foreach ($data as $entry) {
        $data = array(
                'entry_id' => $entry->id,
                'length' => $entry->length,
                'analysis' => $entry->analysis
        );
        $this->db->insert('words', $data);
      }
      return true;
    }

    function update_atomic($word_id, $entry_id)
    {
      $this->db->set('word_'.$word_id, 1);
      $this->db->where('entry_id', $entry_id);
      if( $this->db->update( 'words' ) )
        return true;
    }

    function update_single_word($word)
    {
      $this->db->select('id');
      $this->db->like('content_text', ' '.$word->word.' ');
      $query = $this->db->get('training_set_chosen');
      $results = $query->result();

      foreach ($results as $entry) {
        $this->update_atomic($word->id, $entry->id);
      }
    }

    function clear_notr_entries()
    {
      $this->db->where('analysis', 'n');
      $this->db->delete('words');
    }

    function delete_word_by_id($id)
    {
      $this->db->where('id', $id);
      if($this->db->delete('words'))
        return true;
    }

    function clear_weak_entry($id, $column_ids)
    {
      $statement = 'SELECT SUM(';
      foreach ($column_ids as $value) {
        $statement .= ' word_'.$value['id'].' +';
      }
      $statement = substr($statement, 0, -2);
      $statement .= ') AS total FROM words WHERE id = '.$id.';';

      $query = $this->db->query($statement);
      $result = $query->result();

      $tempTotal = $result[0]->total;

      if( (int)$tempTotal < 3 )
        return true;
      else
        return false;
    }

    function update_whole_table($data)
    {
      foreach ($data as $word) {
        $this->update_single_word($word);
      }
    }

    function update_ct_length($id,$content)
    {
      $this->db->set('length', strlen($content));
      $this->db->where('id', $id);
      if( $this->db->update( 'training_set_chosen' ) )
        return true;
    }

    function sum_total_length($analysis)
    {
      $statement = "SELECT SUM(length) AS total FROM training_set_chosen WHERE analysis = '".$analysis."';";
      $query = $this->db->query($statement);
      $result = $query->result();

      return $result[0]->total;
    }

    function get_count($analysis)
    {
      $this->db->from('training_set_chosen');
      $this->db->where('analysis', $analysis);

      if($result = $this->db->count_all_results())
        return $result;
    }
}
