@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Family Tree of {{ $familyTree['name'] }}</div>
                <div class="card-body">

                    <ul>
                        {{-- Render the root member --}}
                        <li>
                            <strong>{{ $familyTree['name'] }}</strong> ({{ $familyTree['gender'] }})
                            @if($familyTree['spouse'])
                            <ul>
                                <li>Spouse: <strong>{{ $familyTree['spouse']['name'] }}</strong> ({{ $familyTree['spouse']['gender'] }})</li>
                            </ul>
                            @endif

                            {{-- Render the children recursively --}}
                            @if(!empty($familyTree['children']))
                            <ul>
                                @foreach($familyTree['children'] as $child)
                                @include('family-tree.partials.child', ['child' => $child])
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection