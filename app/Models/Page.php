<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Statamic\Facades\Entry;
use Sushi\Sushi;
use Vormkracht10\Seo\Traits\HasSeoScore;

class Page extends Model
{
    use HasFactory;
    use Sushi;
    use HasSeoScore;

    public function getRows(): array
    {
        return Entry::all()->map(function(\Statamic\Entries\Entry $entry) {
            return [
                'id' => $entry->id,
                'permalink' => $entry->permalink,
            ];
        })->toArray();
    }

    public function getUrlAttribute(): string
    {
        return $this->permalink;
    }
}
