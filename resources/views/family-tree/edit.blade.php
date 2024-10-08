@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">Edit Family Member</div>
                <div class="card-body">

                    <form action="{{ route('family-tree.update', $family->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $family->name) }}" required>
                            </div>
                            @error('name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="male" {{ old('gender', $family->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $family->gender) == 'female' ? 'selected' : '' }}>Female</option>
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
                                    @foreach($families as $familyOption)
                                    <option value="{{ $familyOption->id }}" {{ old('father_id', $family->father_id) == $familyOption->id ? 'selected' : '' }}>{{ $familyOption->name }}</option>
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
                                    @foreach($families as $familyOption)
                                    <option value="{{ $familyOption->id }}" {{ old('mother_id', $family->mother_id) == $familyOption->id ? 'selected' : '' }}>{{ $familyOption->name }}</option>
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
                                    @foreach($families as $familyOption)
                                    <option value="{{ $familyOption->id }}" {{ old('spouse_id', $family->spouse_id) == $familyOption->id ? 'selected' : '' }}>{{ $familyOption->name }}</option>
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
                            <span class="input-group-text">
                                @if($family->image)
                                    <img src="{{ asset('storage/' . $family->image) }}" alt="{{ $family->name }}" width="25">&nbsp;
                                    <input type="file" class="form-control" name="image">
                                @endif
                            </span>
                                
                            </div>
                            @error('image')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection