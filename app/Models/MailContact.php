<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailContact extends Model
{
    public $body;
    public $from;
    public $to;
    public $name;
    public $title;
}
