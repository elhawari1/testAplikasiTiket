<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TiketModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_tiket';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'no_hp', 'ticket_id'];

}
