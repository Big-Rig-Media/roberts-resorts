{{--
  Template Name: Taxonomy Type Template
--}}

@extends('layouts.app')

@section('content')
  @php
    $object = get_queried_object();
  @endphp
  @if( TemplateTaxonomyType::getListings($object->post_name) )
    <section class="py-16">
      <div class="container">
        <div class="md:grid md:grid-cols-3 md:gap-15">
          @foreach( TemplateTaxonomyType::getListings($object->post_name) as $listing )
            @php
              switch ( TemplateTaxonomyType::status($listing) ) {
                case 'Available':
                  $bg = 'bg-available';
                break;
                case 'Pending':
                  $bg = 'bg-pending';
                break;
                case 'Sold':
                  $bg = 'bg-sold';
                break;
                default:
                  $bg = 'bg-transparent';
                break;
              }
            @endphp
            <div class="relative">
              <div class="shadow-md">
                @if( App::featuredImage($listing, 'w732x400') )
                  <div class="relative overflow-hidden">
                    @if( TemplateTaxonomyType::status($listing) )
                      <span class="absolute z-50 py-3 font-semibold text-white text-center uppercase text-shadow {{ $bg }}" style="top:20px;left:-80px;width:300px;transform:rotate(-30deg);">{{ TemplateTaxonomyType::status($listing) }}</span>
                    @endif
                    <a href="{{ get_permalink($listing->ID) }}">
                      <img src="{{ App::featuredImage($listing, 'w732x400') }}" />
                    </a>
                  </div>
                @endif
                <div class="p-8">
                  <h4 class="mb-1">{{ $listing->post_title }}</h4>
                  @if( TemplateTaxonomyType::price($listing) || TemplateTaxonomyType::bedrooms($listing) || TemplateTaxonomyType::bathrooms($listing) )
                    <div class="flex flex-row flex-no-wrap text-sm uppercase">
                      @if( TemplateTaxonomyType::price($listing) )
                        <span>${{ TemplateTaxonomyType::price($listing) }}</span>
                      @endif
                      @if( TemplateTaxonomyType::bedrooms($listing) && TemplateTaxonomyType::bathrooms($listing) )
                        <span class="mx-2">
                          <span class="pr-2">&#124;</span>
                          {{ TemplateTaxonomyType::bedrooms($listing) }} BR / {{ TemplateTaxonomyType::bathrooms($listing) }} BA
                          <span class="pl-2">&#124;</span>
                        </span>
                      @endif
                      @if( TemplateTaxonomyType::lotNumber($listing) )
                        <span>Lot {{ TemplateTaxonomyType::lotNumber($listing) }}</span>
                      @endif
                    </div>
                  @endif
                  <div class="mt-4">
                    <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="{{ get_permalink($listing->ID) }}">View Listing</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection
