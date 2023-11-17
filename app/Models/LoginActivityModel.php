<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginActivityModel extends Model{
    protected $table = 'account_login_activity';
    //protected $table = 'afyayangumaishayangu'; 
    
   public function saveLoginInfo($infos){
    $builder = $this->db->table('account_login_activity');
    $builder ->insert($infos);
    if($this->db->affectedRows()==1){
        return $this->db->insertID();
    }else{
        return false;
    }
   }
   public function update_account_logout_time($userID){
    $builder = $this->db->table('account_login_activity');
    $builder->where('id',$userID);
    $builder->update(['logout_time'=>date('Y-m-d h:i:s')]);
    if($this->db->affectedRows()>0){
        return true;
    }else{
        return false;
    }

   }

public function fetchLoginActivityData($userID){
    
    return $this->where('uniid',$userID)->orderBy('login_time','DESC')->findAll();
}



}
