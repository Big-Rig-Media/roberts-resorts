<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * SingleListings
 *
 * Methods available only on the single listings page
 */
class SingleListings extends Controller
{
    /**
     * Get resort portals
     */
    public static function portals($parent)
    {
        $query = new \WP_Query([
            'post_type' => 'listings',
            'post__in'  => $parent
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get resort homes
     */
    public static function homes($parent)
    {
        $query = new \WP_Query([
            'post_type'     => 'listings',
            'post_parent'   => $parent
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get status
     */
    public static function status($home)
    {
        if ( $home ) {
            $terms = get_the_terms($home, 'status');

            if ( $terms ) {
                return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get price
     */
    public static function price($home)
    {
        if ( $home ) {
            return get_field('price', $home);
        }

        return;
    }

    /**
     * Get address
     */
    public static function address($home)
    {
        if ( $home ) {
            return get_geocode_address($home->ID);
        }

        return;
    }

    /**
     * Get agent
     */
    public static function agent($home)
    {
        if ( $home ) {
            return get_field('agent', $home);
        }

        return;
    }

    /**
     * Get agent phone
     */
    public static function agentPhone($home)
    {
        if ( $home ) {
            return get_field('agent_phone', $home);
        }

        return;
    }

    /**
     * Get agent email
     */
    public static function agentEmail($home)
    {
        if ( $home ) {
            return get_field('agent_email', $home);
        }

        return;
    }

    /**
     * Get bedrooms
     */
    public static function bedrooms($home)
    {
        if ( $home ) {
            return get_field('bedrooms', $home);
        }

        return;
    }

    /**
     * Get bathrooms
     */
    public static function bathrooms($home)
    {
        if ( $home ) {
            return get_field('bathrooms', $home);
        }

        return;
    }

    /**
     * Get square footage
     */
    public static function sqft($home)
    {
        if ( $home ) {
            return get_field('square_footage', $home);
        }

        return;
    }

    /**
     * Get lot number
     */
    public static function lotNumber($home)
    {
        if ( $home ) {
            return get_field('lot_number', $home);
        }

        return;
    }

    /**
     * Get carousel
     */
    public static function carousel($home)
    {
        if ( $home ) {
            return get_field('carousel', $home);
        }

        return;
    }

    /**
     * Get statuses
     */
    public function statuses()
    {
        $terms = get_terms([
            'taxonomy'      => 'status',
            'hide_empty'    => false
        ]);

        if ( $terms ) {
            return $terms;
        }

        return;
    }

    public static function frontDeskPhone($resort)
    {
        if ( $resort ) {
            return get_field('front_desk_phone', $resort);
        }

        return;
    }

    public static function homeSalesPhone($resort)
    {
        if ( $resort ) {
            return get_field('home_sales_phone', $resort);
        }

        return;
    }

    public static function homeRentalsPhone($resort)
    {
        if ( $resort ) {
            return get_field('home_rentals_phone', $resort);
        }

        return;
    }
}
