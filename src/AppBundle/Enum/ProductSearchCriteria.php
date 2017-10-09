<?php

namespace AppBundle\Enum;

/**
 * Class ProductSearchCriteria
 *
 * An 'enum' class for product search criteria
 *
 * @package AppBundle\Enum
 */
final class ProductSearchCriteria
{
    /**
     * @const string SEARCH string to search in name description and ref
     */
    const SEARCH = 'search_string';

    /**
     * @const string PREMIUM boolean to search for premium products
     */
    const PREMIUM = 'is_premium';

    /**
     * @const string PRICE_MIN integer to search for products with minimum price
     */
    const PRICE_MIN = 'price_min';

    /**
     * @const string PRICE_MAX integer to search for products with maximum price
     */
    const PRICE_MAX = 'price_max';

    /**
     * @const string NOTE integer search for products with minimum notation
     */
    const NOTE = 'note';

    /**
     * @const string TYPE ID to search for products join by Type
     */
    const TYPE = 'type';

    /**
     * @const string BRAND ID to search for products join by Brand
     */
    const BRAND = 'brand';
}
