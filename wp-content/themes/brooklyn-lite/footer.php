 <?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brooklyn Lite
 */

?>


    <footer class="site-footer text-center">
        <div class="container">
            
            <?php brooklyn_lite_footer_social();?>

            <div class="copyright">
                
                <?php brooklyn_lite_copyrights_text();?>

            </div><!-- /.copyright -->
        </div>
    </footer><!-- /.site-footer -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
