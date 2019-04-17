@extends('layouts.app')

{{-- @section('parsley.min.js')
    {!! Html::styles() !!}
@endsection --}}

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
{{-- sideBar --}}
<div class="d-flex align-items-stretch">
<div id="sidebar" class="sidebar">
    @include('layouts._sidebar')
</div>
{{-- end sideBar --}}

{{-- page holder --}}
<div class="page-holder w-100 d-flex flex-wrap">
<div class="container-fluid px-xl-4">
<section class="">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Catagories</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 py-3">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Create New Catagory </h3>
                </div>
                <div class="card-body">
                    <p>Enter the Catagory name & Description</p>
                    {!! Form::open(['route' => 'catagories.store', 'data-parsley-validate'=> '']) !!}
                    <label class="form-control-label text-uppercase">Name</label>
                    {{Form::text('name',null,array('class'=>"form-control", 'required' => '','maxlength'=>'255'))}}
                    <br>
                    <label class="form-control-label text-uppercase">Catagory Description</label>
                    {{Form::textarea('description',null,array('class'=>"form-control row-12", 'required' => ''))}}
                    <br>
                    {{Form::submit('Create Catagory',array('class'=>"btn btn-outline-success shadow"))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-8 py-3">
            <table class="table table-hover shadow">
                <thead>
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                    @if (count($data)>0)
                        @foreach ($data as $data)
                            <tr class="message">
                                <div class="">
                                </div>
                                <div class="col-sm-1">
                                    <td scope="row">{{$data->id}}</td>
                                </div>
                                <div class="col-sm-2">
                                    <td>{{$data->name}}</td>
                                </div>
                                <div class="col-sm-4">
                                    <td>{{$data->description}}</td>
                                </div>
                                <div class="col-sm-5">
                                    <td>
                                    <a href="/catagories/{{$data->id}}/edit" class="btn btn-outline-info form-control"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                </div>
                                <div class="col-sm-5">
                                    <td>
                                        {!! Form::open(['action' => ['CatagoryController@destroy',$data->id],'method' =>'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                            <button type="submit"  class="btn btn-outline-danger form-control"><i class="fa fa-remove"></i> Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </div>
                            </tr>
                            @endforeach
                            @else
                            <h3>No Catagory found!!</h3>
                            @endif
                        </div>
                </tbody>
            </table>
        </div>
    </div>

    {{-- edit model --}}
    {{-- <div class="modal fade" id="editmodel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Catagory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model(['route' => ['catagories.update', $data->id], 'data-parsley-validate'=> '']) !!}
                <label class="form-control-label text-uppercase">Name</label>
                {{Form::text('name',$cat->name,array('class'=>"form-control", 'required' => '','maxlength'=>'255'))}}
                {{-- <input type="text" class="form-control" value="{{$data->description}}" data-parsley-required data-parsley-maxlength='255'> --}}
                {{-- <br>
                <label class="form-control-label text-uppercase">Catagory Description</label>
                {{Form::textarea('description',$cat->description,array('class'=>"form-control row-12", 'required' => ''))}}
                <br>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div> --}}

    {{-- end edit model --}}

    {{-- ajax --}}

    {{-- end ajax --}}
</section>
</div>

{{-- end pageholder --}}

</div>
</div>
@endsection