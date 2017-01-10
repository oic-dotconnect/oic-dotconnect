<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuth_access()
    {
        $user = App\Models\User::find(1); //とりあえずユーザーを作って変数に用意する

        $this->actingAs($user) // actingAs($user)で$userに入っているuserコンテナ？をログインさせる
            ->visit('/event/entry')	// URLにアクセステストする
            ->see('イベント登録')	// 文字が含まれているか
            ->visit('/event/edit?event_code=11')
            ->see('イベント編集')
            ->visit('/event/control')
            ->see('イベント管理')
            ->visit('/user/setting/tag')
            ->see('お気に入りタグ編集')
            ->visit('/user/setting/profile')
            ->see('プロフィール編集')
            ->visit('/user/setting/notice')
            ->see('通知設定')
            ->visit('/user/setting/leave')
            ->see('退会ページ')
            ->visit('/user/mypage')
            ->see('マイページ');
    }
}
