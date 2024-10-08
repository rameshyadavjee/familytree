@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My Family Group') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Welcome to My Family Group, a dedicated platform for preserving and exploring your family's rich history. This application allows you to create, visualize, and manage your family's lineage with ease. Whether you're tracing your ancestors or documenting the newest members, our Family Tree feature offers a clear and interactive way to see your family's connections across generations.
                    <br/><br/>
                    With My Family Group, you can:
                    <br/><br/>
                    Create and Edit Family Trees: Easily add family members, define relationships, and build your tree.<br/>
                    Visualize Relationships: View your family tree in a dynamic, visually appealing chart that highlights connections between parents, children, and spouses.<br/>
                    Secure Your Data: Rest assured that your family's information is kept safe with modern security practices.
                    <br/><br/>
                    Discover your roots and keep your family connected for generations to come with My Family Group.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection