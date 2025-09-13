@extends('layouts.public')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Contact Guest Services</h2>
                <p>Please fill out the form below and we will get back to you as soon as possible.</p>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('support.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">How can we help?</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection