<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function link_list()
    {
        return $this->belongsTo(LinkList::class);
    }
}
