@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert--error">
      <p class="mb-0">{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}</p>
    </div>
  @endif
@endsection
