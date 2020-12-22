<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

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
     * Get resort child type listings
     */
    public static function listings($parent)
    {
        $query = new \WP_Query([
            'post_type'         => 'listings',
            'posts_per_page'    => -1,
            'post_parent'       => $parent
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get status
     */
    public static function status($listing)
    {
        if ( $listing ) {
            $terms = get_the_terms($listing, 'status');

            if ( $terms ) {
                $slugs = [];

                foreach ( $terms as $term ) {
                    $slugs[] = $term->name;
                }

                return $slugs;

                //return $terms[0]->name;
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
     * Get lot address
     */
    public static function lotAddress($home)
    {
        if ( $home ) {
            return get_field('address', $home);
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

    /**
     * Get front desk phone
     */
    public static function frontDeskPhone($resort)
    {
        if ( $resort ) {
            return get_field('front_desk_phone', $resort);
        }

        return;
    }

    /**
     * Get home sales phone
     */
    public static function homeSalesPhone($resort)
    {
        if ( $resort ) {
            return get_field('home_sales_phone', $resort);
        }

        return;
    }

    /**
     * Get home rentals phone
     */
    public static function homeRentalsPhone($resort)
    {
        if ( $resort ) {
            return get_field('home_rentals_phone', $resort);
        }

        return;
    }

    /**
     * Get resort specials
     */
    public static function specials($slug)
    {
        if ( $slug ) {
            $query = new \WP_Query([
                'post_type'         => 'specials',
                'posts_per_page'    => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'resort',
                        'field'    => 'slug',
                        'terms'    => $slug
                    ]
                ]
            ]);

            if ( $query->have_posts() ) {
                return $query->posts;
            }

            return;
        }

        return;
    }

    /**
     * Create resort listing PDF
     */
    public static function createPDF($listing)
    {
        $ancestors = get_ancestors(get_queried_object_id(), 'listings');

        $dompdf = new Dompdf();
        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        // HTML to convert to PDF
        $html = '<!doctype html>
                    <html>
                        <head>
                            <style type="text/css">
                                html {
                                    height: 100%;
                                }
                                body {
                                    min-height: 100%;
                                    font-size: 16px;
                                    font-family: Helvetica;
                                    color: #232f40;
                                }
                                h1,
                                h6 {
                                    margin-bottom: 10px;
                                    text-transform: uppercase;
                                }
                                h1 {
                                    font-size: 45px;
                                }
                                h6 {
                                    font-size: 21px;
                                }
                                ul {
                                    margin-top: 30px;
                                    margin-bottom: 0;
                                    padding-left: 0;
                                    list-style-type: none;
                                }
                                li {
                                    margin-bottom: 15px;
                                }
                            </style>
                        </head>
                        <body>
                            <h1>'.$listing->post_title.'</h1>
                            <ul>
                                <li>
                                    <strong>Price:</strong>
                                    &#36;'.self::price($listing).'
                                </li>
                                <li>
                                    <strong>Community:</strong>
                                    '.get_post($ancestors[1])->post_title.'
                                </li>
                                <li>
                                    <strong>Agent:</strong>
                                    '.self::agent($listing).'
                                </li>
                                <li>
                                    <strong>Agent Phone:</strong>
                                    '.self::agentPhone($listing).'
                                </li>
                                <li>
                                    <strong>Agent Email:</strong>
                                    '.self::agentEmail($listing).'
                                </li>
                                <li>
                                    <strong>Status:</strong>
                                    '.self::status($listing)[0].'
                                </li>
                                <li>
                                    <strong>Bd/Ba:</strong>
                                    '.self::bedrooms($listing).'
                                </li>
                                <li>
                                    <strong>Sq. Ft:</strong>
                                    '.self::sqft($listing).'
                                    Square Feet
                                </li>
                            </ul>
                            '.apply_filters('the_content', $listing->post_content).'
                        </body>
                    </html>';

        // Render out PDF
        $dompdf->loadHTML($html);
        $dompdf->render();

        // Save PDF into tearsheets directory
        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/app/uploads/listings/'.$listing->post_name.'.pdf', $dompdf->output());
    }
}
