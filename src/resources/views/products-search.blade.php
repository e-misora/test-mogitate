@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products-search.css')}}">
@endsection

@section('content')
    <div class="content-top">
        <h2 class="content__outline">"{{$products['name']}}"の商品一覧</h2>
    </div>
    <div class="content__items">
        <div class="content__items--search">
            <form class="item--search-form" action="/products/search" method="get">
            @csrf
                <input class="item--search-name__input" type="text" name="keyword" value="{{old('keyword')}}">
                <input class="item--search-name__submit" type="submit" value="検索">
                <div class="item--search-price">
                    <p class="item--search-price__tag">価格順で表示</p>
                    <select class="item--search-price__option">
                        <option>価格で並び替え</option>
                        <option value="">高い順に表示</option>
                        <option value="">低い順に表示</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="content__items--products">
            <form class="item--product-card" action="/products/detail" method="post">
            @csrf
                <button class="link__products-detail" type="submit">
                <img class="product-card__img" src="" alt="">
                <input type="hidden" name="image" >
                <div class="product-card__cap">
                    <p>{{$products['name']}}</p>
                    <p>¥{{$products['price']}}</p>
                </div>
                </button>
            </form>
        </div>
    </div>
</form>
@endsection