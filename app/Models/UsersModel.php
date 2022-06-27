<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

	protected $table = 'usuarios';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nome', 'senha', 'ts'];
	protected $returnType = 'object';
}
