<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App\Models
 */
class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'text'
    ];
}
