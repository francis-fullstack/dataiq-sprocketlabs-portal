<?php

namespace App\Models\ServiceProvider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderOrganization extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv2';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sp_organization';
    protected $primaryKey = 'organization_id';
    protected $fillable = [
        'organization_name',
        'created_by',
        'type_of_user',
        'last_edit_user_id',
    ];
}
