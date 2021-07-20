@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Outfits</h2>
                    <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                        <fieldset>
                            <legend>Sort by:</legend>
                            <div>
                                <label>Type</label>
                                <input type="radio" name="sort_by" value="type" @if('type'==$sort) checked @endif>
                            </div>
                            <div>
                                <label>Size</label>
                                <input type="radio" name="sort_by" value="size" @if('size'==$sort) checked @endif>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Direction:</legend>
                            <div>
                                <label>Asc</label>
                                <input type="radio" name="dir" value="asc" @if('asc'==$dir) checked @endif>
                            </div>
                            <div>
                                <label>Desc</label>
                                <input type="radio" name="dir" value="desc" @if('desc'==$dir) checked @endif>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Sort</button>
                        <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                    </form>
                    <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                        <fieldset>
                            <legend>Filter by:</legend>
                            <div class="form-group">
                                <select name="master_id" class="form-control">
                                    @foreach ($masters as $master)
                                    <option value="{{$master->id}}" @if($defaultMaster==$master->id) selected @endif>
                                        {{$master->name}} {{$master->surname}}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select Master from the list.</small>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                    </form>
                    <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                        <fieldset>
                            <legend>Serch by type:</legend>
                            <div class="form-group">
                            <input type="text" class="form-control" name="s" value="{{$s}}">
                            </div>
                        </fieldset>
                        <button type="submit" name="do_search" value="1" class="btn btn-primary">Serch type</button>
                        <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($outfits as $outfit)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    <span class="list-container__content__outfit">{{$outfit->type}} size: {{$outfit->size}}</span>
                                    <span class="list-container__content__master">{{$outfit->masterOfOutfit->name}} {{$outfit->masterOfOutfit->surname}}</span>
                                </div>
                                <div class="list-container__buttons">
                                    <a href="{{route('outfit.edit', [$outfit])}}" class="btn btn-info">Edit</a>
                                    <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                          <h3> No Results </h3>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
