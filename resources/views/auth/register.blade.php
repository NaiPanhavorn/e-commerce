@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded shadow p-8">
        <h2 class="text-2xl font-semibold text-center mb-6">Sign Up</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block">Name</label>
                <input type="text" name="name" required class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block">Password</label>
                <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-6">
                <label class="block">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Sign Up</button>
        </form>

        <p class="text-center text-sm mt-4">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
