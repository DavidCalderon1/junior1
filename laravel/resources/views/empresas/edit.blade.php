@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empresas
        </h1>
   </section>
   <div class="content">
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empresas, ['route' => ['empresas.update', $empresas->id], 'method' => 'patch']) !!}

                        @include('empresas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection