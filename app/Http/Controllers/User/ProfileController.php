<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use App\Console;
use App\Genre;
use App\Holiday;
use App\Frequency;
use App\Residence;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //

    public function add() {
        $residences=Residence::all();
        $holidays=Holiday::all();
        $frequencies=Frequency::all();
        $consoles=Console::all();
        $genres=Genre::all();
        return view('user.profile.profile_create', compact('residences', 'holidays', 'frequencies', 'consoles', 'genres'));
    }

    public function create(Request $request) {
        // Varidationを行う
        $this->validate($request, Profile::$rules);

        $rules = [
            'name.*'  => 'nullable',
        ];

        $validated = $request->validate($rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$profile->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);


        $profile->holiday_id = $this->getParam($form, 'holidays');
        $profile->console_id = $this->getParam($form, 'consoles');
        $profile->genre_id = $this->getParam($form, 'genres');

        // // 休日を保存
        // $holiday_str = '';
        // if ( isset($form['holiday']) ) {
        //     $holidays = $form['holiday'];
        //     // $holiday_str='';
        //     foreach ($holidays as $value) {
        //         # code...
        //         $holiday_str .= $value . ',';
        //     }
        //     unset($form['holiday']);
        // } else {
        //     $profile->holiday  = null;
        // }

        // // ゲーム機種を保存
        // $console_str = '';
        // if ( isset($form['consoles']) ) {
        //     $consoles=$form['consoles'];
        //     // $console_str='';
        //     foreach ($consoles as $value) {
        //         # code...
        //         $console_str.= $value . ',';
        //     }
        //     unset($form['consoles']);
        // } else {
        //     $profile->console = null;
        // }

        // // ゲームジャンルを保存
        // $genre_str = '';
        // if ( isset($form['genres']) ) {
        //     $genres=$form['genres'];
        //     // $genre_str='';
        //     foreach ($genres as $value) {
        //         # code...
        //         $genre_str.= $value . ',';
        //     }
        //     unset($form['genres']);
        // } else {
        //     $profile->genre = null;
        // }

        // dd($form);

        // データベースに保存する
        $profile->fill($form);
        // dd($profile->toArray());
        $profile->user_id = Auth::id();
        // $profile->holiday_id = $holiday_str;
        // $profile->console_id = $console_str;
        // $profile->genre_id = $genre_str;
        // dd($profile->toArray());

        $profile->save();
        // dd($profile->toArray());

        return redirect('profile');
    }

    public function edit(Request $request) {

        // プロフィールデータ取得
        $profile = Auth::user()->profile;

        // 関連付け
        $holidays = Holiday::all();
        $frequencies = Frequency::all();
        $consoles = Console::all();
        $genres = Genre::all();

        // 数字の間に,をいれて配列にする
        $hol_arr = explode(',', $profile->holiday_id);
        // dd($hol_arr);
        $con_arr = explode(',', $profile->console_id);
        // dd($con_arr);
        $gen_arr = explode(',', $profile->genre_id);

        return view('user.profile.profile_edit', compact('profile', 'holidays','frequencies', 'consoles', 'genres', 'hol_arr', 'con_arr', 'gen_arr'));

    }

    public function update(Request $request) {

        // Validation
        $this->validate($request, Profile::$rules);

        // Profile からデータを取得
        $profile = Auth::user()->profile;

        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        if ($request->remove == 'true') {
            $form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $form['image_path'] = basename($path);
        } else {
            $form['image_path'] = $profile->image_path;
        }

        unset($form['image']);
        unset($form['remove']);
        unset($form['_token']);

        // // 該当するデータを上書きして保存する
        // $profile->fill($profile_form)->save();

        $profile->holiday_id = $this->getParam($form, 'holidays');
        $profile->console_id = $this->getParam($form, 'consoles');
        $profile->genre_id = $this->getParam($form, 'genres');

        // データベースに保存する
        $profile->fill($form);
        $profile->user_id = Auth::id();

        $profile->save();

        return redirect()->route('profile');
    }

    public function index(Request $request) {

        $profiles = Profile::all();

        return view('user.profile.profile', compact('profiles'));
    }

    // private function getHoliday(&$form) {
    //     // 休日を保存
    //     $holiday_str = '';
    //     if ( isset($form['holiday']) ) {
    //         $holidays = $form['holiday'];
    //         // $holiday_str='';
    //         foreach ($holidays as $value) {
    //             # code...
    //             $holiday_str .= $value . ',';
    //         }
    //         unset($form['holiday']);
    //         return $holiday_str;
    //     } else {
    //         return null;
    //     }
    // }

    private function getParam(&$form, $paramName) {
        $str = '';
        // isset→変数が定義されていて、変数がnullかどうか判定
        if ( isset($form[$paramName]) ) {
            $params = $form[$paramName];
            // foreach(配列名 as 未定義要素)→$paramsのデータの後に「,」を追加し、配列にする
            foreach ($params as $value) {
                $str .= $value . ',';
            }
            // unset→要素を削除
            unset($form[$paramName]);
            return $str;
        } else {
            return null;
        }
    }

}
