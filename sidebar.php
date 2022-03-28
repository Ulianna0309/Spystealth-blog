<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spytealth
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <div class="table-of-content v-col-lg-12" data-table-of-content>
        <h2 class="post__title black">Table of content</h2>
        <ul class="table-of-content__list" data-table>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #1. Check What’s New in Your Backlink Profile</a>
            </li>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #2. Get Back Any Links You’ve Lost</a>
            </li>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #3. Cherry-pick New Link Building Ideas from the Right Rivals</a>
            </li>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #4. Find Content Ideas to Attract Links</a>
            </li>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #6. Audit Your Anchor Texts</a>
            </li>
            <li class="table-of-content__list-item">
                <a class="table-of-content__list-item--link black" href="#">Move #7. Get Rid of Toxic Backlinks</a>
            </li>
        </ul>
    </div>
</aside><!-- #secondary -->
