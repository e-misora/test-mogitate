@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products-register.css')}}">
@endsection

@section('content')
<div class="products-register__content">
    <h2>商品登録</h2>
    <form class="products-register__form" action="/products" method="post" enctype="multipart/form-data">
    @csrf
        <div class="products-register__form-group">
            <span class="products-register__form--label">商品名</span>
            <span class="products-register__form--required">必須</span>
            <input class="products-register__form--input" type="text" name="name"  placeholder="商品名を入力" value="{{old('name')}}">
        </div>
        <div class="form-error">
            @error('name')
            {{$message}}
            @enderror
        </div>
        <div class="products-register__form-group">
            <span class="products-register__form--label">値段</span>
            <span class="products-register__form--required">必須</span>
            <input class="products-register__form--input" type="text" name="price"  placeholder="値段を入力">
        </div>
        <div class="form-error">
            @error('price')
            {{$message}}
            @enderror
        </div>
        <div class="products-register__form-group">
            <span class="products-register__form--label">商品画像</span>
            <span class="products-register__form--required">必須</span>
        <input type="file" id="imageInput" accept="image/*" name="image">
        <img id="preview" src="" alt="画像プレビュー" style="max-width: 300px; display: none;">

        <script>
            const imageInput = document.getElementById('imageInput');
            const preview = document.getElementById('preview');

            imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        </script>
        </div>

        <div class="form-error">
            @error('image')
            {{$message}}
            @enderror
        </div>
        <div class="products-register__form-group">
            <span class="products-register__form--label">季節</span>
            <span class="products-register__form--required">必須</span>
            <div>
            <input class="products-register__form--radio" type="radio" id="spring" name="season">
            <label for="spring">春</label>
            <input class="products-register__form--radio" type="radio" id="summer" name="season">
            <label for="summer">夏</label>
            <input class="products-register__form--radio" type="radio" id="autumn" name="season">
            <label for="autumn">秋</label>
            <input class="products-register__form--radio" type="radio" id="winter" name="season">
            <label for="winter">冬</label>
            </div>
        </div>
        <div class="products-register__form-group">
            <span class="products-register__form--label">商品説明</span>
            <span class="products-register__form--required">必須</span>
            <textarea name="description" class="products-register__form--input" rows="6" placeholder="商品の説明を入力" ></textarea>
        </div>
        @error('description')
        {{$message}}
        @enderror
        <div class="products-register__form--button">
            <a class="products-register__form--back" href="/products">戻る</a>
            <button class="products-register__form--submit" type="submit">登録</button>
        </div>
    </form>

</div>

@endsection