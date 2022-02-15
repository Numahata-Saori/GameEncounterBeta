@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2 class="com-5">PROFILE 編集</h2>
      <form action="{{ action('User\ProfileController@update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (count($errors) > 0)
          <ul>
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <br>

        <div class="form-group row">
            <label class="col-md-2" for="image">画像</label>
            <div class="col-md-10">
                <input type="file" class="form-control-file" name="image">
                <div class="form-text text-info">
                    @if (Auth::user()->profile->image_path)
                      <img width="100px" src="{{ asset('storage/image/' . Auth::user()->profile->image_path) }}">
                    @else
                      <img width="100px" src="{{ asset('storage/image/noimage.png') }}">
                    @endif
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="name" class="form-label">ニックネーム</label>
            <input type="text" class="form-control prof-1 prof-2" name="name" value="{{ Auth::user()->profile->name }}">
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="residence" class="form-label">居住地</label><br>
              {{-- <select class="form-select prof-1 prof-2" name="residence_id" value="{{ old('residence_id') }}">
              @foreach($residences as $residence)
                  <option value="{{ $residence->id }}">{{ $residence->name }}</option>
              @endforeach
              </select> --}}
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="birthday" class="form-label">生年月日</label><br>
            <div class="form-inline">
              <input name="birth01" type="text" class="prof-1 prof-3 js-changeYear" value="{{ Auth::user()->profile->birth01 }}">
              <label for="InputName1">年</label>

              <select name="birth02" class="form-select prof-1 js-changeMonth">
                <option value="1" @if(1 == $profile->birth02) selected @endif>1</option>
                <option value="2" @if(2 == $profile->birth02) selected @endif>2</option>
                <option value="3" @if(3 == $profile->birth02) selected @endif>3</option>
                <option value="4" @if(4 == $profile->birth02) selected @endif>4</option>
                <option value="5" @if(5 == $profile->birth02) selected @endif>5</option>
                <option value="6" @if(6 == $profile->birth02) selected @endif>6</option>
                <option value="7" @if(7 == $profile->birth02) selected @endif>7</option>
                <option value="8" @if(8 == $profile->birth02) selected @endif>8</option>
                <option value="9" @if(9 == $profile->birth02) selected @endif>9</option>
                <option value="10" @if(10 == $profile->birth02) selected @endif>10</option>
                <option value="11" @if(11 == $profile->birth02) selected @endif>11</option>
                <option value="12" @if(12 == $profile->birth02) selected @endif>12</option>
              </select>
              <label for="InputName1">月</label>

              <select name="birth03" class="form-select prof-1 js-changeDay">
                {{-- <option selected>--選択してください--</option> --}}
                <option value="1" @if(1 == $profile->birth03) selected @endif>1</option>
                <option value="2" @if(2 == $profile->birth03) selected @endif>2</option>
                <option value="3" @if(3 == $profile->birth03) selected @endif>3</option>
                <option value="4" @if(4 == $profile->birth03) selected @endif>4</option>
                <option value="5" @if(5 == $profile->birth03) selected @endif>5</option>
                <option value="6" @if(6 == $profile->birth03) selected @endif>6</option>
                <option value="7" @if(7 == $profile->birth03) selected @endif>7</option>
                <option value="8" @if(8 == $profile->birth03) selected @endif>8</option>
                <option value="9" @if(9 == $profile->birth03) selected @endif>9</option>
                <option value="10" @if(10 == $profile->birth03) selected @endif>10</option>
                <option value="11" @if(11 == $profile->birth03) selected @endif>11</option>
                <option value="12" @if(12 == $profile->birth03) selected @endif>12</option>
                <option value="13" @if(13 == $profile->birth03) selected @endif>13</option>
                <option value="14" @if(14 == $profile->birth03) selected @endif>14</option>
                <option value="15" @if(15 == $profile->birth03) selected @endif>15</option>
                <option value="16" @if(16 == $profile->birth03) selected @endif>16</option>
                <option value="17" @if(17 == $profile->birth03) selected @endif>17</option>
                <option value="18" @if(18== $profile->birth03) selected @endif>18</option>
                <option value="19" @if(19 == $profile->birth03) selected @endif>19</option>
                <option value="20" @if(20 == $profile->birth03) selected @endif>20</option>
                <option value="21" @if(21 == $profile->birth03) selected @endif>21</option>
                <option value="22" @if(22 == $profile->birth03) selected @endif>22</option>
                <option value="23" @if(23 == $profile->birth03) selected @endif>23</option>
                <option value="24" @if(24 == $profile->birth03) selected @endif>24</option>
                <option value="25" @if(25 == $profile->birth03) selected @endif>25</option>
                <option value="26" @if(26 == $profile->birth03) selected @endif>26</option>
                <option value="27" @if(27 == $profile->birth03) selected @endif>27</option>
                <option value="28" @if(28 == $profile->birth03) selected @endif>28</option>
                <option value="29" @if(29 == $profile->birth03) selected @endif>29</option>
                <option value="30" @if(30 == $profile->birth03) selected @endif>30</option>
                <option value="31" @if(31 == $profile->birth03) selected @endif>31</option>
              </select>
              <label for="InputName1">日</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">休日</label><br>
            @php $arr = old('holidays', $hol_arr); @endphp
            @foreach($holidays as $holiday)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="holiday[]" value="{{ $holiday->id }}"
                {{ in_array($holiday->id, $arr, false)? ' checked' : '' }} >
                <label class="form-check-label">{{ $holiday->name }}</label>
              </div>
            @endforeach

            {{-- @if ($errors->has('holiday'))
              <span class="error">{{$errors->first('holiday')}}</span>
            @endif --}}
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">ゲームの頻度</label><br>
            <select class="form-select prof-1 prof-2" name="frequency_id">
            @foreach($frequencies as $frequency)
                <option value="{{ $frequency->id }}" @if($frequency->id == $profile->frequency_id) selected @endif >{{ $frequency->name }}</option>
            @endforeach
            </select>
            {{-- @if ($errors->has('checkbox'))
              <span class="error">{{$errors->first('checkbox')}}</span>
            @endif --}}
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">所持ゲーム</label><br>
            @php $arr = old('consoles', $con_arr); @endphp
            @foreach($consoles as $console)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="consoles[]" value="{{ $console->id }}"
                {{ in_array($console->id, $arr, false)? ' checked' : '' }}>
                <label class="form-check-label">{{ $console->name }}</label>
              </div>
            @endforeach
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">興味のあるジャンル</label><br>
            @php $arr = old('genres', $gen_arr); @endphp
            @foreach($genres as $genre)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}"
                {{ in_array($genre->id, $arr, false)? ' checked' : '' }} >
                <label class="form-check-label" for="genre01">{{ $genre->name }}</label>
              </div>
            @endforeach
          </div>
        </div>


        <div class="form-group row">
          <div class="mb-3">
            <label for="game_code" class="form-label">PSPIN/フレンドコードetc...</label><br>
            <input type="text" class="form-control prof-1 prof-2" name="game_code01" value="{{ Auth::user()->profile->game_code01 }}">
            <input type="text" class="form-control prof-1 prof-2" name="game_code02" value="{{ Auth::user()->profile->game_code02 }}">
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">チャット機能</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="chat_flag" value="true" id="chat_flag01" @if(true == $profile->chat_flag) checked @endif>
              <label class="form-check-label" for="chat_flag01">ON</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="chat_flag" value="false" id="chat_flag02" @if(false == $profile->chat_flag) checked @endif>
              <label class="form-check-label" for="chat_flag02">OFF</label>
            </div>

            @if ($errors->has('chat_flag'))
              <span class="error">{{$errors->first('chat_flag')}}</span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="introduction" class="form-label">自己紹介</label>
          <textarea class="form-control" name="introduction" rows="5">{{ Auth::user()->profile->introduction }}</textarea>
        </div>

        {{ csrf_field() }}

        <a href="{{ route('profile') }}"><input type="submit" class="btn btn-primary" value="更新"></a>
      </form>
    </div>
  </div>
</div>
@endsection
