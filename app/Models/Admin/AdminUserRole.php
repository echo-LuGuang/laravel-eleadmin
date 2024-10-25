<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * @mixin IdeHelperAdminUserRole
 */
final class AdminUserRole extends BaseModel
{
    use Cachable;
}
