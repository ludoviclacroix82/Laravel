@extends('layouts.default')

@section('title', 'View invoicess')


@section('content')
    <main id='invoices-show'>
        <section>
            <div class="wrap">
                <div class="header">
                    Invoices : {{$invoices->company}}
                </div>
                <div class="content">
                    <ul>
                        <li>
                            <label>Ref</label>
                            {{$invoices->ref}}
                        </li>
                        <li>
                            <label>Title</label>
                            {{$invoices->title}}
                        </li>
                        <li>
                            <label>price</label>
                            {{$invoices->price}}
                        </li>
                        <li>
                            <label>TVA</label>
                            {{$invoices->tva}}
                        </li>
                        <li class="description">
                            <label>Description</label>
                            {{$invoices->description}}
                        </li>
                        <li>
                            <label>Modification</label>
                            {{$invoices->updated_at}}
                        </li>
                        <li>
                            <label>Creation</label>
                            {{$invoices->created_at}}
                        </li>
                    </ul>
                </div>
                <div class="button">
                    <button class="button-blue">
                        <a href="/admin/invoices/edit/{{$invoices->id}}">Update</a>
                    </button>
                    <button class="button-custom">
                        <a href="/admin/invoices/delete/{{$invoices->id}}">Delete</a>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection