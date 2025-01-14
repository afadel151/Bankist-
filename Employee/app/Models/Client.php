<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\EngineManager;
use Laravel\Scout\Engines\Engine;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use Searchable;
    protected $table = 'u_users';
    public function searchableAs(): string
    {
        return 'clients_index';
    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();
 
        // Customize the data array...
 
        return $array;
    }
    public function searchableUsing(): Engine
    {
        return app(EngineManager::class)->engine('algolia');
    }
}
