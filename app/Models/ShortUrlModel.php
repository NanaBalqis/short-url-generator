<?php

namespace App\Models;

use CodeIgniter\Model;

class ShortUrlModel extends Model
{
    protected $table = 'short_urls';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'original_url',
        'short_code',
        'clicks'
    ];
}