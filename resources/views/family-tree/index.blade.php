@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Family Tree</div>
                <div class="card-body">
                    <div class="responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                @foreach($families as $family)
                                <tr>
                                    <th scope="row"><a href="{{ route('family-tree.show', $family->id) }}">{{ $family->name }}</a></th>
                                    <td>{{ ucfirst($family->gender) }}</a></td>
                                    <td>@if($family->gender=='male')
                                        <a href="{{ route('family-tree.mytree', $family->id) }}">Tree 1</a> &nbsp;&nbsp;&nbsp; <a href="{{ route('family-tree.mytree1', $family->id) }}">Tree 2</a>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($family->image)
                                        <img src="{{ asset('storage/' . $family->image) }}" alt="{{ $family->name }}" width="25">
                                        @else
                                        <i class="bi bi-card-image"></i>
                                        @endif
                                    </td>
                                    <td><a href="{{route('family-tree.edit',$family->id)}}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection