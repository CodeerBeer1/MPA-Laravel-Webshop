@extends('layouts.app')

@php $cart = Session::get('cart') @endphp

@section('customer-form')

<a id="backbtn" href="{{ route('shopping-cart') }}"><button>Terug</button></a>
<form method="post" action="{{ route('processingorder.validate') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="customer-details-div">
        <p id="errmsg">{{ $Message ?? '' }}</p>
        <p>Vul even uw gegevens in</p>
        <div>
            <label>Naam</label>
            <input name="name">
        </div>

        <div>
            <label>Achternaam</label>
            <input name="last_name">
        </div>

        <div>
            <label>Woonplaats</label>
            <input name="residence">
        </div>

        <div>
            <label>Straat</label>
            <input name="street">
        </div>

        <div>
            <label>Postcode</label>
            <input name="postcode">
        </div>

        <div>
            <label>E-mailadres</label>
            <input name="email" value="{{ $email ?? '' }}">
        </div>

        <div>
            <label>Telefoonnummer</label>
            <input name="phone">
        </div>

        <div>
            <input id="finish-order" type="submit" value="Bestelling afronden">
        </div>

    </div>
</form>


@endsection