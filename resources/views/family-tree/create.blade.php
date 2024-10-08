@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">Create Family Member</div>
                <div class="card-body">
                    <form action="{{ route('family-tree.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            @error('gender')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="father_id" class="col-sm-2 col-form-label">Father</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="father_id" name="father_id">
                                    <option value="">None</option>
                                    @foreach($families as $family)
                                    <option value="{{ $family->id }}" {{ old('father_id') == $family->id ? 'selected' : '' }}>{{ $family->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('father_id')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="mother_id" class="col-sm-2 col-form-label">Mother</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="mother_id" name="mother_id">
                                    <option value="">None</option>
                                    @foreach($families as $family)
                                    <option value="{{ $family->id }}" {{ old('mother_id') == $family->id ? 'selected' : '' }}>{{ $family->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mother_id')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="spouse_id" class="col-sm-2 col-form-label">Spouse</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="spouse_id" name="spouse_id">
                                    <option value="">None</option>
                                    @foreach($families as $family)
                                    <option value="{{ $family->id }}" {{ old('spouse_id') == $family->id ? 'selected' : '' }}>{{ $family->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('spouse_id')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">
                            </div>
                            @error('image')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection