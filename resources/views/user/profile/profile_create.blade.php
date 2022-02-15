@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2 class="com-5">PROFILE 新規登録</h2>
      <form action="{{ action('User\ProfileController@create') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (count($errors) > 0)
          <ul>
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif

        <div class="form-group row">
          <div class="mb-3">
            <div class="form-group row">
            <label class="col-md-2" for="image">画像</label>
            <div class="col-md-10"><br>
                <input type="file" class="form-control-file" name="image">
                {{-- <div class="form-text text-info">
                  @if ( old('image') == null)
                    <img width="100px" src="{{ asset('storage/image/noimage.png') }}">
                  @else
                    <img width="100px" src="{{ asset('storage/image/' . old('image')) }}">
                  @endif
                </div> --}}

            </div>
        </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="name" class="form-label">ニックネーム</label>
            <input type="text" class="form-control is-invalid prof-1 prof-2" id="validationServer03" name="name" value="{{ old('name') }}" placeholder="例:ぬまたまん" required>
            {{-- @if ($errors->has('name'))
              <span class="error">{{$errors->first('name')}}</span>
            @endif --}}
            <div class="invalid-feedback">
              @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="residence" class="form-label">居住地</label><br>
              <select class="form-select prof-1 prof-2" name="residence_id" value="{{ old('residence_id') }}">
              @foreach($residences as $residence)
                  <option value="{{ $residence->id }}">{{ $residence->name }}</option>
              @endforeach
              </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label for="birthday" class="form-label">生年月日</label><br>
            <div class="form-inline">
              <input name="birth01" type="text" class="prof-1 prof-3 js-changeYear" value="{{ old('birth01') }}">
              <label for="InputName1">年</label>

              <select name="birth02" class="form-select prof-1 js-changeMonth" aria-label="Default select example">
                {{-- <option selected>--選択してください--</option> --}}
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <label for="InputName1">月</label>

              <select name="birth03" class="form-select prof-1 js-changeDay" aria-label="Default select example">
                {{-- <option selected>--選択してください--</option> --}}
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <label for="InputName1">日</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">休日</label><br>
            {{-- foreach($配列名 as $要素名)~endforeach→配列を繰り返す制御構文 --}}
            @foreach($holidays as $holiday)
              <div class="form-check form-check-inline">
                {{-- is_array→値が配列ならtrue、holidaysが配列ならtrue --}}
                {{-- in_array(探したい値,対象の値,戻り値)→配列に値があるか調べる、$holiday->idがoholidaysの配列の中にあるかどうか調べる --}}
                <input class="form-check-input" type="checkbox" name="holiday[]" value="{{ $holiday->id }}"
                {{ is_array(old("holidays")) && in_array($holiday->id, old("holidays"), true)? ' checked' : '' }} >
                <label class="form-check-label">{{ $holiday->name }}</label>
              </div>
            @endforeach

            {{-- ヴァリデーションエラー --}}
            {{-- if(条件式)~endif→条件分岐の制御構文 --}}
            @if ($errors->has('holiday'))
              <span class="error">{{$errors->first('holiday')}}</span>
            @endif
            {{-- @error('holiday')
              <div class="error">{{ $message }}</div>
            @enderror --}}

          </div>
        </div>


        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">ゲームの頻度</label><br>
            <select class="form-select prof-1 prof-2" name="frequency_id" value="{{ old('frequency_id') }}">
            @foreach($frequencies as $frequency)
                <option value="{{ $frequency->id }}">{{ $frequency->name }}</option>
            @endforeach
            </select>

            {{-- @foreach($frequencies as $frequency)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="frequency_id" value="{{ $frequency->id }}"
              @if( old('frequency') == "{{ $frequency->id }}") checked @endif>
              <label class="form-check-label">{{ $frequency->name }}</label>
            </div>
            @endforeach --}}

          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">所持ゲーム</label><br>
            @foreach($consoles as $console)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="consoles[]" value="{{ $console->id }}"
                {{ is_array(old("consoles")) && in_array($console->id, old("consoles"), true)? ' checked' : '' }} >
                <label class="form-check-label">{{ $console->name }}</label>
              </div>
            @endforeach
          </div>
        </div>

        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">興味のあるジャンル</label><br>
            @foreach($genres as $genre)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}"
                {{ is_array(old("genres")) && in_array($genre->id, old("genres"), true)? ' checked' : '' }} >
                <label class="form-check-label">{{ $genre->name }}</label>
              </div>
            @endforeach
          </div>
        </div>


        <div class="form-group row">
          <div class="mb-3">
            <label for="game_code" class="form-label">PSPIN/フレンドコードetc...</label><br>
            <input type="text" class="form-control prof-1 prof-2" name="game_code01" value="{{ old('game_code01') }}" placeholder="PSPIN" >
            <input type="text" class="form-control prof-1 prof-2" name="game_code02" value="{{ old('game_code02') }}" placeholder="フレンドコード">
          </div>
        </div>
        <div class="form-group row">
          <div class="mb-3">
            <label class="form-label">チャット機能</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="chat_flag" value="true" id="chat_flag01" checked>
              <label class="form-check-label" for="chat_flag01">ON</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="chat_flag" value="false" id="chat_flag02">
              <label class="form-check-label" for="chat_flag02">OFF</label>
            </div>
            @if ($errors->has('checkbox'))
              <span class="error">{{$errors->first('checkbox')}}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="introduction" class="form-label">自己紹介</label>
          <textarea class="form-control" name="introduction" value="{{ old('introduction') }}" rows="5"></textarea>
        </div>
        {{ csrf_field() }}
        <a href="{{ route('profile') }}"><input type="submit" class="btn btn-primary" value="保存"></a>
      </form>
    </div>
  </div>
</div>
@endsection
