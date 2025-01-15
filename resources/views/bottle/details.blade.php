@extends('layouts.app')
@section('title', 'Détails')
@section('content')
<main class="flex-center height80">
    <section class="structure flex-col mt-20 gap20">
        <article class="details-article">
            <picture class="details-image_container">
                <img class="details-image" src="{{ $bottle->image_src ?? asset('img/gallery/bottle_static.webp') }}" alt="{{ $bottle->title }}">
            </picture>
            <h2 class="details-title">{{ $bottle->title }}</h2>
            <span class="details-price">Prix: {{$bottle->price}}</span>


            <form action="" method="POST">
            @csrf
            <label for="quantity">
                Quantite
                <input type="number" name="quantity" >
                </label>
                <label for="Cellier_idCellier">
                @foreach( $celliers as $cellier)
                @if($cellier->idCellier == 1)
                <input hidden type="number" name="Cellier_idCellier" value="{{ $cellier->idCellier }}" >
                @endif
                @endforeach
                </label>
                <label for="Bottle_id">
                <input hidden type="number" name="Bottle_id" value="{{ $bottle->id }}" >
                </label>
                <label for="a_commander">
                <input hidden type="number" name="a_commander" value="0" >
                </label>
                <label for="bu">
                <input hidden  type="number" name="bu" value="0" >
                </label>
                <input hidden type="submit" value="Ajouter au cellier">
            </form>



           
            <a href="{{ route('cellar.add', ['id' => $bottle->id]) }}" class="btn btn-border">Ajouter au cellier</a>

        </article>

        <div class="line"></div>

        <article class="info-details">
            <h3>Infos détaillées</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nam ipsam quia quam hic reiciendis sed ipsum voluptatem officiis voluptas, perspiciatis tenetur inventore? Excepturi, quidem consequatur sint aspernatur deleniti aliquid laborum odit amet pariatur earum non quibusdam veritatis nisi officia.</p>
        </article>
    </section>
</main>
@endsection