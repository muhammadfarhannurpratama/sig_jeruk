<?php

/**
 * Created by PhpStorm.
 * User: Affan
 * Date: 06/03/2018
 * Time: 20.51
 * @method $this with_motor(string $arguments = '', string $where = '')
 */
class M_log_rek extends CI_Model
{
	public function __construct()
	{
		$this->table = 'tb_log_rek';
		$this->primary_key = 'id_log';
		$this->fillable = ['lahan_id', 'metode', 'nilai', 'urutan', 'created_by', 'updated_by', 'nilai', 'exec_time', 'sesi'];
		$this->protected = [$this->primary_key];
		$this->has_one['tb_lahan'] = array('foreign_model' => 'M_Lahan', 'foreign_table' => 'lahan', 'foreign_key' => 'id_lahan', 'local_key' => 'lahan_id');
		parent::__construct();
	}
}
