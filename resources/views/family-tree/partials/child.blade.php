<li>
    <strong>{{ $child['name'] }}</strong> ({{ $child['gender'] }})
    @if($child['spouse'])
        <ul>
            <li>Spouse: <strong>{{ $child['spouse']['name'] }}</strong> ({{ $child['spouse']['gender'] }})</li>
        </ul>
    @endif

    @if(!empty($child['children']))
        <ul>
            @foreach($child['children'] as $grandchild)
                @include('family-tree.partials.child', ['child' => $grandchild])
            @endforeach
        </ul>
    @endif
</li>
