@extends('layouts.default')

@section('title', 'View invoicess')


@section('content')
<main id='invoices-show'>
    <section>
        <div class="wrap">
            <div class="tools-links">
                <a href="{{URL::previous()}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                    </svg>
                    Retour Invoices
                </a>
            </div>
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
                    <li>
                        <label>Author</label>
                        {{$invoices->author}}
                    </li>
                </ul>
            </div>
            
            <div class="button">
                @can('update',$invoices)
                <button class="button-blue">
                    <a href="/admin/invoices/edit/{{$invoices->id}}">Update</a>
                </button>
                @endcan
                @can('delete',$invoices)
                <button class="button-custom">
                    <a href="/admin/invoices/delete/{{$invoices->id}}">Delete</a>
                </button>
                @endcan
            </div>
        </div>
    </section>
</main>
@endsection