<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function joins() {
        return $this->belongsToMany(Community::class, 'joins', 'user_id', 'community_id');
    }

    // // このユーザが参加してる1以上のcommunity
    // public function joinsCommunitys() {
    //     return $this->belongsToMany(User::class, 'joins', 'user_id', 'community_id')->withTimestamps();
    // }

    // // communityに参加している1以上のユーザ
    // public function joinsUser() {
    //     return $this->belongsToMany(User::class, 'joins', 'community_id', 'user_id')->withTimestamps();
    // }

    // // $community_idで指定されたcommunityに参加する
    // public function joins($userId) {

    //     // すでにお気に入りしているかの確認
    //     $exist = $this->is_join($communityId);
    //     if ($exist) {
    //     // すでに参加していれば退会する
    //     return false;
    //     } else {
    //     // 参加していなければ参加する
    //     $this->join()->attach($userId);
    //     return true;
    //     }

    //     // return $this->hasMany('App/Join');
    // }

    // public function leave($userId)
    //     {
    //     // すでに参加しているかの確認
    //     $exist = $this->is_join($userId);
    //     if ($exist) {
    //     // すでに参加していれば退会する
    //     $this->join()->detach($communityId);
    //     return true;
    //     } else {
    //     // 未フォローであれば何もしない
    //     return false;
    //     }
    // }

    // // 指定された $communityIdのユーザをこのコミュニティに参加ているか調べる。参加しているならtrueを返す
    // public function is_join($userId) {
    //     // 参加しているコミュニティの中に $userIdのものが存在するか
    //     return $this->join()->where('community_id', $userId)->exists();
    // }


}
