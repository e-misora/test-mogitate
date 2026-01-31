@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products-detail.css')}}">
@endsection

@section('content')

<div class="products-detail__content">
    <div class="products-detail__content-top">
        <span class="products-detail__content-tag">商品一覧</span>
        <span>></span>
        <span>{{$products['name']}}</span>
    </div>
    <form class="products-update__form" method="post" action="/products">
        @method('PATCH')
        @csrf
        <div class="products-detail__form-inner">
            <div class="products-detail__form-items">
                <img class="products-detail__form-img" src="{{asset('storage/'.'fruits-img/'.$products['image'])}}" alt="">
                <input type="file">
            </div>
            <div class="products-detail__form-items">
                <label for="name">商品名</label>
                <input class="products-detail__form-input" type="text" id="name" value="{{$products['name']}}">
                <label for="price">値段</label>
                <input class="products-detail__form-input" type="text" id="price"value="{{$products['price']}}">
                <p>季節</p>
                <input class="products-detail__form-option--seasons" type="radio" id="spring"><label for="spring">春</label>
                <input class="products-detail__form-option--seasons" type="radio" id="summer"><label for="summer">夏</label>
                <input class="products-detail__form-option--seasons" type="radio" id="autumn"><label for="autumn">秋</label>
                <input class="products-detail__form-option--seasons" type="radio" id="winter"><label for="winter">冬</label>
            </div>
        </div>
        <div>
            <label for="description">商品説明</label>
            <textarea class="products-detail__form-textarea" rows="6" name="description" id="description">{{$products['description']}}</textarea>
        </div>
        <input type="hidden" name="id" value="{{$products['id']}}">
        <div class="products-detail__form-button">
            <a class="products-detail__form--back" href="/products">戻る</a>
            <button class="products-detail__form--submit">変更を保存</button>
            </form>
            <form class="form__products--delete" action="/product/delete" method="post">
            @method('DELETE')
            @csrf
                <button class="form__delete-submit">
                    <img class="form__delete-button" src="{{asset('icons8-削除-48.png')}}" alt="">
                    <input type="hidden" name="id" value="{{$products['id']}}">
                </button>
            </form>
        </div>
</div>
@endsection