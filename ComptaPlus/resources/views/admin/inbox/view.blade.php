@extends('layouts.default')

@section('title', 'Inbox')


@section('content')
<main id='admin'>
    <section>
        <div class="container-fluid">
            <div class="row">
                <x-profil-nav />
                <main role="main" class="col-md-10 ms-sm-auto px-4">
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
                            {{$datas->subject}}
                        </div>
                        <div class="content">
                            <ul>
                                <li class='d-flex flex-column text-start'>
                                    <label>Subject</label>
                                    {{$datas->subject}}
                                </li>
                                <li class='d-flex flex-column text-start'>
                                    <label>Message</label>
                                    {{$datas->body}}
                                </li>
                                <li>
                                    <label>{{$status}}</label>
                                    {{$datas->user}}
                                </li>
                                <li>
                                    <label>Status</label>
                                    {{$datas->is_read}}  
                                </li>
                                <li>
                                    <label>Creation</label>
                                    {{$datas->created_at}}
                                </li>
                            </ul>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </section>

</main>
@endsection