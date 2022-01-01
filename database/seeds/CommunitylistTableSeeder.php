<?php

use Illuminate\Database\Seeder;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class CommunitylistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('communities')->truncate();

        // 1→アクション
        // 2→アドベンチャー
        // 3→シューティング
        // 4→ロールプレイング
        // 5→シュミレーション
        // 6→スポーツ
        // 7→格闘
        // 8→レース
        // 9→音楽ゲーム
        // 10→パズル
        // 11→テーブルゲーム
        // 12→パーティ
        // 13→コミュニティ
        // 14→学習・教育
        // 15→トレーニング
        // 16→ツール

        $communities = [
            // 1→PlayStation4/5
            [
                'name' => "PlayStationVR\nOculusQuest",
                'console_id' => 1,
                'genre_id' => 1,
                'explanation' => 'a',
            ],
            [
                'name' => 'a',
                'console_id' => 1,
                'genre_id' => 2,
                'explanation' => 'a',
            ],
            // 2→PlayStationVita
            [
                'name' => "GOD EATER\nRESURRCTION",
                'console_id' => 2,
                'genre_id' => 1,
                'explanation' => 'a',
            ],
            [
                'name' => "GOD EATER2\nRAGE BURST",
                'console_id' => 2,
                'genre_id' => 1,
                'explanation' => 'a',
            ],
            [
                'name' => "ぼくのなつやすみ🄬2\nナゾナゾ姉妹と沈没船の秘密!",
                'console_id' => 2,
                'genre_id' => 2,
                'explanation' => 'a',
            ],
            [
                'name' => "ぼくのなつやすみ🄬4\n瀬戸内少年探偵団",
                'console_id' => 2,
                'genre_id' => 2,
                'explanation' => 'a',
            ],
            [
                'name' => "チャイルドオブライト",
                'console_id' => 2,
                'genre_id' => 2,
                'explanation' => 'a',
            ],
            [
                'name' => "FINAL FANTASY 零式",
                'console_id' => 2,
                'genre_id' => 4,
                'explanation' => 'a',
            ],
            [
                'name' => "FINAL FANTASY X",
                'console_id' => 2,
                'genre_id' => 4,
                'explanation' => 'a',
            ],
            [
                'name' => "ドラゴンクエストビルダーズ\nアルフガルドを復活せよ",
                'console_id' => 2,
                'genre_id' => 4,
                'explanation' => 'a',
            ],
            [
                'name' => "ドラゴンクエストヒーローズ2\n双子の王と予言の終わり",
                'console_id' => 2,
                'genre_id' => 4,
                'explanation' => 'a',
            ],
            [
                'name' => "空の軌跡FC",
                'console_id' => 2,
                'genre_id' => 4,
                'explanation' => 'a',
            ],
            // 3→PlyaStationVR OculusQuest
            [
                'name' => '',
                'console_id' => 2,
                'genre_id' => 1,
                'explanation' => 'a',
            ],


            // 4→Xbox Series S


            // 5→NintendoSwitch


            // 6→NINTENDO 3DS


            // 7→PC


            // 8→その他

        ];
        DB::table('communities')->insert($communities);
    }
}
