<?php
use Step\Acceptance;

/**
 * @group 2_header
 */
class BlogCest
{

        /**
         * Checking Blog
         * @param \Page\Blog $blogPage
         */

        function checkBlogPage(\Page\Blog $blogPage)
        {
            $blogPage->blog();
        }











}
