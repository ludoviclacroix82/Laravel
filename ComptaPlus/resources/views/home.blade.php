@extends('layouts.default')

@section('title', 'Home')


@section('content')
   
<main id='home'>
   <section>
      <div class="services">
         <a href="/clients">
            Clients
         </a>            
      </div>
      <div class="services">
      <a href="/invoices">
            Factures
         </a>
      </div>
   </section>
</main>

@endsection