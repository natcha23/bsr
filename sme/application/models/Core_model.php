<?php
class Core_model extends CI_Model{
    public function find( $table, $where=array(1=>1), $fields='*' ){
        $this->db->select( $fields )->from( $table )->where( $where );
        $sql = $this->db->get();
        $arr = $sql->result_array();
        return $arr;
    }

    public function findOne( $table, $where=array(1=>1), $fields='*' ){
        $this->db->select( $fields )->from( $table )->where( $where );
        $sql = $this->db->get();
        $arr = $sql->row_array();
        return $arr;
    }

    public function insert( $table, $post , $addups ){
        $data = array();
        $fields = $this->db->list_fields( $table );
        foreach($fields as $field){
            if(isset($post[$field])) $data[$field] = $post[$field];
        }

        foreach($addups as $index => $val){
            $data[$index] = $val;
        }

        $this->db->insert( $table, $data);
        $insert_id = $this->db->insert_id();
        $effect_row = $this->db->affected_rows();

        return array('insert_id'=>$insert_id, 'effect_row'=>$effect_row);
    }

    public function update( $table, $post, $addups, $where){
        $data = array();
        $fields = $this->db->list_fields( $table );
        foreach($fields as $field){
            if(isset($post[$field]) && $field != 'id') $data[$field] = $post[$field];
        }
        foreach($addups as $index => $val){
            $data[$index] = $val;
        }
        $this->db->update( $table, $data, $where);
        $effect_row = $this->db->affected_rows();

        return array('effect_row'=>$effect_row);
    }
}