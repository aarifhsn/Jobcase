@extends('layouts.app')

@section('content')
<form action="{{ route('company.updateProfile') }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Company Contact Number -->
    <input type="text" name="contact_number" value="{{ old('contact_number', $company->contact_number) }}">

    <!-- Company Industry -->
    <input type="text" name="industry" value="{{ old('industry', $company->industry) }}">

    <!-- Website -->
    <input type="url" name="website" value="{{ old('website', $company->website) }}">

    <!-- Address -->
    <input type="text" name="address" value="{{ old('address', $company->address) }}">

    <!-- City -->
    <input type="text" name="city" value="{{ old('city', $company->city) }}">

    <!-- State -->
    <input type="text" name="state" value="{{ old('state', $company->state) }}">

    <!-- Country -->
    <input type="text" name="country" value="{{ old('country', $company->country) }}">

    <!-- Pincode -->
    <input type="text" name="pincode" value="{{ old('pincode', $company->pincode) }}">

    <!-- Description -->
    <textarea name="description">{{ old('description', $company->description) }}</textarea>

    <button type="submit">Update Profile</button>
</form>

@endsection