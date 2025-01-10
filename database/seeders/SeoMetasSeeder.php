<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoMetasSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('seo_metas')->truncate();

        $routes = [
            // Home
            ['route' => '/', 'title' => 'Home', 'meta_title' => 'Quadrazon - Home', 'meta_description' => 'Welcome to Quadrazon, your one-stop solution for all your marketing, sales, and business needs.', 'meta_keywords' => 'home, Quadrazon'],

            // Marketing & Ads
            ['route' => '/marketing-ads', 'title' => 'Marketing & Ads', 'meta_title' => 'Quadrazon - Marketing & Ads', 'meta_description' => 'Explore our marketing and advertising services that help you grow your business with powerful strategies.', 'meta_keywords' => 'marketing, ads, business growth'],
            ['route' => '/service/promotion-strategy', 'title' => 'Promotion Strategy', 'meta_title' => 'Quadrazon - Promotion Strategy', 'meta_description' => 'Effective promotion strategies to boost your brand visibility and sales.', 'meta_keywords' => 'promotion, strategy'],
            ['route' => '/service/ppc-marketing', 'title' => 'PPC Marketing', 'meta_title' => 'Quadrazon - PPC Marketing', 'meta_description' => 'Drive traffic and sales with our Pay-Per-Click marketing services.', 'meta_keywords' => 'ppc, marketing, pay-per-click'],
            ['route' => '/service/dsp-advertising', 'title' => 'DSP Advertising', 'meta_title' => 'Quadrazon - DSP Advertising', 'meta_description' => 'Reach your audience at scale with DSP advertising.', 'meta_keywords' => 'dsp, advertising'],
            ['route' => '/service/seo', 'title' => 'Search Optimization', 'meta_title' => 'Quadrazon - SEO', 'meta_description' => 'Improve your search engine ranking with Quadrazon SEO services.', 'meta_keywords' => 'seo, optimization'],
            ['route' => '/service/phase-1-search-term-optimization', 'title' => 'Search Term Optimization', 'meta_title' => 'Quadrazon - Search Term Optimization', 'meta_description' => 'Optimize search terms to increase website traffic and visibility.', 'meta_keywords' => 'search term, optimization'],
            ['route' => '/service/phase-2-incremental-indexing', 'title' => 'Incremental Indexing', 'meta_title' => 'Quadrazon - Incremental Indexing', 'meta_description' => 'Incremental indexing to keep your content up-to-date in search engines.', 'meta_keywords' => 'indexing, incremental'],
            ['route' => '/service/phase-4-market-share', 'title' => 'Market Share Growth', 'meta_title' => 'Quadrazon - Market Share Growth', 'meta_description' => 'Expand your market share with our tailored growth strategies.', 'meta_keywords' => 'market share, growth'],
            ['route' => '/service/company-creation', 'title' => 'Company Creation', 'meta_title' => 'Quadrazon - Company Creation', 'meta_description' => 'Start your business with our expert company creation services.', 'meta_keywords' => 'company, creation'],
            ['route' => '/service/product-launches', 'title' => 'Product Launches', 'meta_title' => 'Quadrazon - Product Launches', 'meta_description' => 'Successfully launch your products with our end-to-end solutions.', 'meta_keywords' => 'product, launches'],

            // Marketplace Management
            ['route' => '/marketplace-management', 'title' => 'Marketplace Management', 'meta_title' => 'Quadrazon - Marketplace Management', 'meta_description' => 'Manage your online marketplace presence with our expert services.', 'meta_keywords' => 'marketplace, management'],
            ['route' => '/service/ads-management', 'title' => 'Ads Management', 'meta_title' => 'Quadrazon - Ads Management', 'meta_description' => 'Streamline your advertising efforts with our comprehensive ad management services.', 'meta_keywords' => 'ads, management'],
            ['route' => '/service/store-management', 'title' => 'Store Management', 'meta_title' => 'Quadrazon - Store Management', 'meta_description' => 'Efficient store management services to help you maximize sales and customer satisfaction.', 'meta_keywords' => 'store, management'],
            ['route' => '/service/vendor-central-management', 'title' => 'Vendor Management', 'meta_title' => 'Quadrazon - Vendor Management', 'meta_description' => 'Optimize your vendor relationships and processes with our management services.', 'meta_keywords' => 'vendor, management'],
            ['route' => '/service/posts-management', 'title' => 'Posts Management', 'meta_title' => 'Quadrazon - Posts Management', 'meta_description' => 'Manage your posts effectively to reach your audience and improve engagement.', 'meta_keywords' => 'posts, management'],
            ['route' => '/service/logistics-service', 'title' => 'Logistics Service', 'meta_title' => 'Quadrazon - Logistics Service', 'meta_description' => 'Efficient logistics services to streamline your business operations.', 'meta_keywords' => 'logistics, service'],
            ['route' => '/service/go-to-market-strategy', 'title' => 'Go-To-Market Strategy', 'meta_title' => 'Quadrazon - Go-To-Market Strategy', 'meta_description' => 'Create a successful go-to-market strategy with our expert services.', 'meta_keywords' => 'market strategy'],
            ['route' => '/service/seller-central-management', 'title' => 'Seller Central Management', 'meta_title' => 'Quadrazon - Seller Central Management', 'meta_description' => 'Manage your seller central account effectively with our management services.', 'meta_keywords' => 'seller central, management'],

            // Audit & Suspension
            ['route' => '/audit-suspension', 'title' => 'Audit & Suspension', 'meta_title' => 'Quadrazon - Audit & Suspension', 'meta_description' => 'Audit and suspension services to protect your business and accounts.', 'meta_keywords' => 'audit, suspension'],
            ['route' => '/service/brand-protection', 'title' => 'Brand Protection', 'meta_title' => 'Quadrazon - Brand Protection', 'meta_description' => 'Protect your brand from counterfeit and fraud with our brand protection services.', 'meta_keywords' => 'brand, protection'],
            ['route' => '/service/consumer-audit', 'title' => 'Consumer Audit', 'meta_title' => 'Quadrazon - Consumer Audit', 'meta_description' => 'Audit your consumer experience to ensure compliance and satisfaction.', 'meta_keywords' => 'consumer, audit'],
            ['route' => '/service/listing-reinstatement', 'title' => 'Listing Reinstatement', 'meta_title' => 'Quadrazon - Listing Reinstatement', 'meta_description' => 'Reinstate your listings to regain visibility and sales.', 'meta_keywords' => 'listing, reinstatement'],
            ['route' => '/service/account-suspension', 'title' => 'Account Suspension', 'meta_title' => 'Quadrazon - Account Suspension', 'meta_description' => 'Get your account reinstated quickly with our expert account suspension services.', 'meta_keywords' => 'account, suspension'],

            // Copywriting
            ['route' => '/copywriting', 'title' => 'Copywriting', 'meta_title' => 'Quadrazon - Copywriting', 'meta_description' => 'Engaging and persuasive copywriting services for your brand and business.', 'meta_keywords' => 'copywriting'],
            ['route' => '/service/brand-guidelines', 'title' => 'Brand Guidelines', 'meta_title' => 'Quadrazon - Brand Guidelines', 'meta_description' => 'Ensure consistency in your brand with our expert brand guideline services.', 'meta_keywords' => 'brand, guidelines'],
            ['route' => '/service/storefront-design', 'title' => 'Storefront Design', 'meta_title' => 'Quadrazon - Storefront Design', 'meta_description' => 'Design an attractive and functional storefront that converts visitors into customers.', 'meta_keywords' => 'storefront, design'],
            ['route' => '/service/product-photography', 'title' => 'Product Photography', 'meta_title' => 'Quadrazon - Product Photography', 'meta_description' => 'High-quality product photography services that make your products stand out.', 'meta_keywords' => 'product, photography'],
            ['route' => '/service/product-videography', 'title' => 'Product Videography', 'meta_title' => 'Quadrazon - Product Videography', 'meta_description' => 'Create compelling product videos to increase customer engagement and sales.', 'meta_keywords' => 'product, videography'],
            ['route' => '/service/image-editing', 'title' => 'Image Editing', 'meta_title' => 'Quadrazon - Image Editing', 'meta_description' => 'Enhance your product images with professional image editing services.', 'meta_keywords' => 'image, editing'],
            ['route' => '/service/enhanced-content', 'title' => 'Enhanced Content', 'meta_title' => 'Quadrazon - Enhanced Content', 'meta_description' => 'Boost your product listings with enhanced content and visual elements.', 'meta_keywords' => 'content, enhanced'],
            ['route' => '/service/catalog-setup', 'title' => 'Catalog Setup', 'meta_title' => 'Quadrazon - Catalog Setup', 'meta_description' => 'Set up and organize your product catalog to enhance your online store.', 'meta_keywords' => 'catalog, setup'],
            ['route' => '/service/description-writing', 'title' => 'Description Writing', 'meta_title' => 'Quadrazon - Description Writing', 'meta_description' => 'Write compelling and optimized product descriptions that drive sales.', 'meta_keywords' => 'description, writing'],
            ['route' => '/service/listing-optimization', 'title' => 'Listing Optimization', 'meta_title' => 'Quadrazon - Listing Optimization', 'meta_description' => 'Optimize your product listings for better search rankings and conversions.', 'meta_keywords' => 'listing, optimization'],
            ['route' => '/service/ctr-hack', 'title' => 'CTR Hack', 'meta_title' => 'Quadrazon - CTR Hack', 'meta_description' => 'Improve your Click-Through Rate (CTR) with our proven strategies.', 'meta_keywords' => 'ctr, hack'],
            ['route' => '/service/updates-maintenance', 'title' => 'Updates & Maintenance', 'meta_title' => 'Quadrazon - Updates & Maintenance', 'meta_description' => 'Regular updates and maintenance to keep your site running smoothly.', 'meta_keywords' => 'updates, maintenance'],

            // Single Links & Others
            ['route' => '/faqs', 'title' => 'FAQ\'s', 'meta_title' => 'Quadrazon - FAQ\'s', 'meta_description' => 'Frequently Asked Questions to help you with Quadrazon services.', 'meta_keywords' => 'faqs'],
            ['route' => '/contact', 'title' => 'Contact', 'meta_title' => 'Quadrazon - Contact Us', 'meta_description' => 'Contact Quadrazon for inquiries, support, or more information.', 'meta_keywords' => 'contact'],
            ['route' => '/about-us', 'title' => 'About Us', 'meta_title' => 'Quadrazon - About Us', 'meta_description' => 'Learn more about Quadrazon and our journey towards helping businesses grow.', 'meta_keywords' => 'about us'],
            ['route' => '/portfolio', 'title' => 'Portfolio', 'meta_title' => 'Quadrazon - Portfolio', 'meta_description' => 'Explore our portfolio of successful projects and satisfied clients.', 'meta_keywords' => 'portfolio'],
            ['route' => '/case-studies', 'title' => 'Case Studies', 'meta_title' => 'Quadrazon - Case Studies', 'meta_description' => 'Read our case studies and success stories of businesses we\'ve helped grow.', 'meta_keywords' => 'case studies'],
            ['route' => '/blogs', 'title' => 'Blogs', 'meta_title' => 'Quadrazon - Blogs', 'meta_description' => 'Stay updated with the latest news and insights from Quadrazon.', 'meta_keywords' => 'blogs'],
        ];

        DB::table('seo_metas')->insert($routes);
    }
}
