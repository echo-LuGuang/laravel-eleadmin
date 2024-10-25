<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * 
 *
 * @property int $id
 * @property string $title 菜单标题
 * @property string|null $icon 菜单图标
 * @property int $menu_type 0:目录 1:菜单 2:按钮
 * @property int $parent_id 父级菜单
 * @property string|null $authority_code 权限标识
 * @property int $is_hide 是否隐藏
 * @property string|null $path 路由地址
 * @property string|null $component 组件地址
 * @property int $open_type 打开方式 0组件 1内链 2外链
 * @property int $sort 排序 大-小
 * @property string|null $meta 路由元数据
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\AdminRole> $roles
 * @property-read int|null $roles_count
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereAuthorityCode($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereComponent($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereCreatedAt($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereIcon($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereId($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereIsHide($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereMenuType($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereMeta($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereOpenType($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereParentId($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu wherePath($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereSort($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereTitle($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu whereUpdatedAt($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminMenu withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperAdminMenu {}
}

namespace App\Models\Admin{
/**
 * 
 *
 * @property int $id
 * @property string $code 角色标识
 * @property string $name 角色名称
 * @property string|null $notes 角色描述
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\AdminUser> $adminUsers
 * @property-read int|null $admin_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\AdminMenu> $menus
 * @property-read int|null $menus_count
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereCode($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereCreatedAt($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereId($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereName($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereNotes($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole whereUpdatedAt($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminRole withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperAdminRole {}
}

namespace App\Models\Admin{
/**
 * 
 *
 * @property int $id
 * @property string $username 账号
 * @property string $password 密码
 * @property string|null $nickname 昵称
 * @property string|null $avatar 头像
 * @property string|null $phone 手机号
 * @property int $status 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin\AdminRole> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminUser whereUsername($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperAdminUser {}
}

namespace App\Models\Admin{
/**
 * 
 *
 * @property int $admin_role_id 角色ID
 * @property int $admin_user_id admin用户ID
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole whereAdminRoleId($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole whereAdminUserId($value)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder<static>|AdminUserRole withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperAdminUserRole {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	final class IdeHelperUser {}
}

