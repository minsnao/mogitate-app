@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>商品登録</h1>

<form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
@csrf
<div>
    <table>
        <tr>
            <th>商品名</th>
            <td>
                <input type="text" name="name" placeholder="商品名を入力" required>
            </td>
        </tr>
        <tr>
            <th>値段</th>
            <td>
                <input type="number" name="price" placeholder="値段を入力" required>
            </td>
        </tr>
        <tr>
            <th>ファイルの選択</th>
            <td>
                <input type="file" name="image" required>
            </td>
        </tr>
        <tr>
            <th>季節</th>
            <td>
                <label><input type="checkbox" name="seasons[]" value="春">春</label>
                <label><input type="checkbox" name="seasons[]" value="夏">夏</label>
                <label><input type="checkbox" name="seasons[]" value="秋">秋</label>
                <label><input type="checkbox" name="seasons[]" value="冬">冬</label>
            </td>
        </tr>
        <tr>
            <th>商品説明</th>
            <td>
                <textarea name="description" placeholder="商品名の説明を入力" required></textarea>
            </td>
        </tr>
    </table>
    <div class="">
        <div class="" style="margin-top: 20px;">
            <a href="{{ url('/products') }}">戻る</a>
        </div>
        <div class="">
            <button type="submit">登録</button>
        </div>
    </div>
</div>
</form>

@endsection