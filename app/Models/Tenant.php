<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int $quantity
 */
class Tenant extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'owner_id'
    ];

    protected static function newFactory(): TenantFactory
    {
        return TenantFactory::new();
    }

    public function owner(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'tenant_id', 'id');
    }
}
