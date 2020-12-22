{{--
  Template Name: Taxonomy Type Template
--}}

@extends('layouts.app')

@section('content')
  @if( $post->post_content )
    <section class="py-8 md:pt-16">
      <div class="container">
        @php the_content() @endphp
      </div>
    </section>
  @endif
  @php
    $object = get_queried_object();
  @endphp
  @if( TemplateTaxonomyType::getListings($object->post_name) )
    <section class="pb-16">
      <div class="container">
        <!--
        @if( $statuses )
          <div class="md:flex md:flex-row md:flex-no-wrap md:justify-end mb-10">
            <form class="js-filter-listings" method="post">
              <div class="flex flex-column flex-wrap">
                <label class="block w-full mb-2 font-semibold uppercase" for="status">Filter by Type</label>
                <select class="w-full h-10 max-h-input px-6 border border-primary-7" name="status">
                  <option selected>Please Select</option>
                  @foreach( $statuses as $status )
                    <option value=".{{ $status->slug }}">{{ $status->name }}</option>
                  @endforeach
                </select>
              </div>
            </form>
          </div>
        @endif
        -->
        <div class="md:flex md:flex-row md:flex-wrap -mx-2 js-listings">
          @foreach( TemplateTaxonomyType::getListings($object->post_name) as $listing )
            @php
              switch ( SingleListings::status($listing)[0] ) {
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
            <div class="relative w-full md:w-1/3 px-2 mb-4 {{ strtolower(implode(' ', TemplateTaxonomyType::status($listing))) }}">
              <div class="shadow-md">
                @if( App::featuredImage($listing, 'w732x400') )
                  <div class="relative overflow-hidden">
                    @if( TemplateTaxonomyType::status($listing) )
                      <span class="absolute z-50 py-3 font-semibold text-white text-center uppercase text-shadow {{ $bg }}" style="top:20px;left:-80px;width:300px;transform:rotate(-30deg);">{{ TemplateTaxonomyType::status($listing)[0] }}</span>
                    @endif
                    <a href="{{ get_permalink($listing->ID) }}">
                      <img src="{{ App::featuredImage($listing, 'w732x400') }}" alt="{{ $listing->post_title }}" loading="lazy" />
                    </a>
                  </div>
                @endif
                <div class="p-8">
                  <h4 class="mb-0">{{ $listing->post_title }}</h4>
                  @if( TemplateTaxonomyType::resort($listing) )
                    <span class="block mb-4 text-base">{{ TemplateTaxonomyType::resort($listing) }}</span>
                  @endif
                  @if( TemplateTaxonomyType::price($listing) || TemplateTaxonomyType::bedrooms($listing) || TemplateTaxonomyType::bathrooms($listing) )
                    <div class="flex flex-row flex-no-wrap text-sm uppercase">
                      @if( TemplateTaxonomyType::price($listing) && (TemplateTaxonomyType::bedrooms($listing) && TemplateTaxonomyType::bathrooms($listing)) && TemplateTaxonomyType::lotNumber($listing) )
                        <span>${{ TemplateTaxonomyType::price($listing) }}</span>
                        <span class="mx-2">
                          <span class="pr-2">&#124;</span>
                          {{ TemplateTaxonomyType::bedrooms($listing) }} BR / {{ TemplateTaxonomyType::bathrooms($listing) }} BA
                          <span class="pl-2">&#124;</span>
                        </span>
                        <span>Lot {{ TemplateTaxonomyType::lotNumber($listing) }}</span>
                      @endif
                      @if( TemplateTaxonomyType::price($listing) && TemplateTaxonomyType::lotNumber($listing) && !TemplateTaxonomyType::bedrooms($listing) && !TemplateTaxonomyType::bathrooms($listing) )
                        <span>${{ TemplateTaxonomyType::price($listing) }}</span>
                        <span class="ml-2">
                          <span class="pr-2">&#124;</span>
                          Lot {{ TemplateTaxonomyType::lotNumber($listing) }}
                        </span>
                      @endif
                    </div>
                  @endif
                  <div class="mt-4">
                    <a class="btn btn--secondary" href="{{ get_permalink($listing->ID) }}">View Listing</a>
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
