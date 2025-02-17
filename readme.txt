=== Woocommerce CSV importer ===
Contributors: Allaerd
Tags: Woocommerce, commerce, e-commerce, ecommerce, inventory, stock, products, import, csv, multiple images, upload, export

Requires at least: 4.0
Tested up to: 4.8

Donate link: https://allaerd.org

License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Import products into woocommerce.

== Description ==

Import and manage products in Woocommerce. Upload your CSV file, create your header and import. The import plugin uses AJAX to import the products. No more timeouts on big files. This plugin is tested to 10.000+ products.
First step is to look at your settings, select the right field separator and take a look at the other settings as well. When you have done that it's time to link the right columns to the right fields. Upload your CSV file in the header tab and link them. If the plugin can map the fields it will do so automatically.

When you have mapped the right fields, it is time to import!

= There are a few nice add-ons: =

1. Import variable products
2. Import attributes
3. Import custom fields
4. Import premium
5. import taxonomies

You can find them at [allaerd.org](http://allaerd.org/shop)

I do not answer questions on the forum anymore. If you have questions about the add-ons or the free importer, fill in my [contact form](https://allaerd.org/support/). Before asking questions please read the [documentation](https://allaerd.org/knowledgebase/). If you have questions about the add-ons, make sure to add you order number!

== Frequently Asked Questions ==

= How do i use it =

[youtube http://www.youtube.com/watch?v=RBLyoGCqa0Y]

= It does not import or i get an error =

Enable debug in the settings tab and check you javascript console for more info.

= What fields can i import? =

You can import all basic fields. With the add-ons you can import all woocommerce products types.

= Are the example files? =

Yes there are. Check [example files](https://allaerd.org/knowledgebase/example-files/)

== Screenshots ==

1. Upload a CSV and create a header
2. Link the fields to the right column
3. Upload the CSV, look at the preview and run your import!

== Installation ==

1. Upload to the plugins directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Upgrade Notice ==
Version 3.1.0  is mayor release. Please make a backup first before you upgrade! And be sure to upgrade you add-ons to version 3+.

== Changelog ==

= future development =
* schedule options ( in progress 50% )
* sorting of headers
* add-ons versions will be visible in add-ons part and upgrade notices
* export options other product types
* support for xls, xml, feeds

= 3.3.6 =
* export works again with headers

= 3.3.5 =
* fix bug in export when there are no headers

= 3.3.4 =
* new query for retreiving images. ( thank to Felix )
* new way of validtion image URL's
* clear transients after product save

= 3.3.3 =
* post parent handling in the main plugin

= 3.3.2 =
* solved a bug when the plugin was installed and no header was present
* solved a bug when the product was empty
* always clear output before returning

= 3.3.1 =
* added wc_vendors plugin support
* added woocommerce jetpack Country Groups support and currency
* added WC_Product_Vendors support

= 3.2.1 =
* solved a crash when activating the new importer

= 3.2.0 =
* exporter added for simple products and variations
* images must have a direct name when uploading
* added a function to normalize price input 1,23 1.23 1.234,56 1,234.56 $1,234.56 $1.234,56 all will be saved as 1234.56
* rearranged the oder of price handling so normalization takes place before assigning the actual price.
* add interface for logging
* added some more logging details when there are errors in image handling
* you can now edit headers if you upload the the same file
* Always start a fresh run for exporting products. In this case the header is always done first


= 3.1.4 =
* if set_time_limit is disabled it will no longer throw a security error
* add back utf08 conversion
* add notice if file upload went wrong, most of the time the file is bigger than max_post_size or upload_max_filesize

= 3.1.3 =
* add a new setting, auto, for number of rows to process. If auto is selected, based on your php settings and the duration of the imports the rows to process is changed for every cycle.
* typo sprinf should be
* tags will import again

= 3.1.2 =
* fixed a bug where images that are attached with names where not found

= 3.1.1 =
* to use utf08 conversion make sure mb-string is installed!
* when creating batches make sure you are adding arrays and not null values

= 3.1.0 =
* added import batches, they will be used for scheduling
* improved speed, 1000 rows take less than 3 minutes.
* a lot of refactoring so it wil be more compatible with standard wordpress and woocommerce development

= 3.0.6 =
* localised
* solved a problem with merging

= 3.0.5 =
* add total_sales to new products so some themes that use this for sorting show the products.
* utf-8 support for header preview
* trim meta values to loose spaces
* added a check to prevent an error that could happen in preview mode when a wrong separator is chosen
* starting refactoring files for future scheduling options
* fixed bug when merging and using the ID to find products
* use WP functions to upload and handle images with url's

= 3.0.4 =
* change if statement in import preview to help out old php versions
* add a setting to use CURLOPT_FOLLOWLOCATION, it can give warnings when safe_mode or open_basedir is used.

= 3.0.3 = 
* fixed var_dump issue :-(

= 3.0.2 =
* add skip option, if skip is set to true during runtime, the product will not be imported.
* fixed bug for image import using url's

= 3.0.1 =
* convert to UTF-08 during import setting
* added progress bar during import
* each imports creates a batch to track it's progress. needed for future scheduling option and fire and forget option.
* use wc_delete_product_transients if the function is available
* [BUGFIX] beter support for special characters in URL when you import images
* add redirect option in Curl when using import images with the filename

= 3.0.0 =
* multiple headers
* speed optimisation
* complete rebuild of plugin, hooks and filters
* settings part
* documentation part
* add-on part
* special chars allowed in url for images. (htmlspecialchars added to parse url)
* convert to UTF-08 during import setting

= 2.2.3 =
* redirect to header tab if no header is present

= 2.2.2 = 
* changes the shipping class import a bit more to be more inline with categories

= 2.2.1 = 
* fixed bug if shipping class was empty or contained spaces

= 2.2.0 =
* if merging keep current tags, attributes and shipping class.
* change the way how to validate an url. Not all url's where validated and therefor not all images where uploaded
* solved a bug when spaces or %20 where in filenames of urls. Added sanitize_file_name and url_decode to to clean the name.
* solved the header preview, showed row 2 3 times
* add add-on section and preparations for version control

= 2.1.0 =
* fixed an issue when images have the same name and are stored in the same location. The image was overridden instead of appending -X to the filename
* if an image is uploaded with an URL and does not have an extension use CURLINFO_CONTENT_TYPE to determine the mime type
* language support dutch,english
* added some smartness when mapping header fields
* added post_author field
* price is not supported anymore. Use regular_price and/or sale_price

= 2.0.8 =
* fixed an issue in the roles

= 2.0.7 =
* Added role support. admin's can now select which roles are allowed to import
* fixed a bug with merging and prices

= 2.0.6 =
* fixed an error while deleting trancients (credits: Stephen Weir)

= 2.0.5 =
* allow prices to be 0
* added prefix for options table when deleting trancients (credits: Olivier Sazos)

= 2.0.4 =
* fixed typo in parsing of visibility data  "catelog must be catalog"
* check if a wc_delete_product_transients exists or not to prevent error on older installs of Woocommerce

= 2.0.3 =
* small bug when price in the header but is empty. It was set to 0 now it will be empty again.
* added notify to backorder parsing array as allow value

= 2.0.2 =
* added change_stock field. You can now add a stick adjustment and it will calculate the stock for an existing product. 
* bug fix for parsing of post title field for variable products (they do not need a title)

= 2.0.1 =
* you can use post_title as well to find products. Order is look for ID, look by SKU, look by post_title. It takes the lowest product it can find if there are mutliple
* fix for updating by ID first field in the csv was deleted

= 2.0.0 =
* added parsing of data. It checks a lot of values and correct them if they are wrong
* changed the price functionality to use regular or sales price and not price anymore
* fixed a terrible bug with featured image importing
* changes the JS to give feedback on every row and not on the last raw of the current block
* a lot of tweaks for deleting cache stuff
* added the ID field, you can now use the current ID of a product to update it.
* added ping_status and menu_order fields

= 1.2.8 =
* add some hooks for future add-on (import custom taxonomies like brands)

= 1.2.7 =
* typo's
* changed the way the filename is used. Windows users experienced problems.
* lot's of improvements

= 1.2.6 = 
* if you use globals.....make them global 

= 1.2.5 =
* delete transients during import

= 1.2.4 =
* Solved a bug with new products (thanks Niall Walsh)

= 1.2.3 =
* solved another image by name problem! Now use get_posts to retreive image instead of query.

= 1.2.2 =
* Solve image problem by using cURL to get the images with an URL, file_get_contents is sometimes disabled on certain servers
* Start chaging some file names to be more in the wordpress standard
* Added some hooks and filters
* Some minor improvments
* added comment_status

= 1.2.1 =
* added some info about the max file size
* warning for ini_set resolved
* solved bug that product gallery was not shown when images field was used.
* solved bug that did not find images from the media manager that contain spaces

= 1.2.0 =
* Change position for menu, sometimes it confilicts with other plugins
* Added setting to merge products
* Added new image fields for featured image and product gallery. They used to be both in the images field.
* Added more info, descriptions and help texts. 
* Mayor code, speed and memory improvements
* Added post_name support
* Added shipping_class support
* Added options for category handling
* Added support for multi-site

= 1.1.2 =
* fixed a bug with the multiple categories. Now all categories are linked to the product instead of the last

= 1.1.1 =
* fixed a bug with the sales price. Was a typo in the fields. Now sales prices should be imported correct!
* If you have no SKU or leave it empty, a new post is created. but remember no SKU no updating!!!! 

= 1.1.0 =
This is a mayor revision of the plugin. A lot of small and larger bugfixes are done! Thanks to some help from the forum and code suggestions. 

* ajaxurl in javascript instead of hard link to ajax page (solves the problem that a header or the settings could not be saved!)
* added option to enable/disable adding images to gallery
* bug fixes for IE
* header and settings are not saved anymore through ajax.

= 1.0.8 =
* fixed a possible bug when saving settings

= 1.0.7 =
* add the product by default to simple term

= 1.0.6 =
* add ob_get_clean() to prevent errors from stopping the script

= 1.0.5 =
* solved bug with upload not working on windows machine!
* better handling images 

= 1.0.4 =
* added support for product gallery. the last image is set as thumbnail! (thanks to Fahad Mahmood) 

= 1.0.3 =
* add more options for number of rows to process in the same run to prevent timeouts

= 1.0.2 =
* add manage stock to field list
 
= 1.0.1 =
* Admin warnings only show on plugin page 
* get rid of some old functions 

= 1.0.0 =
* Complete new importer. With AJAX calls, custom headers and add-ons to import custom fields and attributes. BAckup your old stuff before trying this one!

= 0.7.3 =
* add option to import custom fields. In your CSV file add extra columns with the prefix cf_ . For example if you want the custom field colour, you add cf_colour in your header.

= 0.7.2 =
* fix a small bug. Menu was not visible because other plugin used the same menu order.

= 0.7.1 =
* fix some bugs (thanks to fransberns)

= 0.7.0 =
* fix for wordpress 3.5 wp_update_post does not insert anymore :-( 

= 0.6.1 =
* fixed header already sent bug when activating

= 0.6.0 =
* added experimental schedule function. Can be enabled for fixed imports in the settings page.
* solved some bugs related to empty fields in import
* solved some bugs related to check if a file is there and if it is valid

= 0.5.5 =
* added setting to convert a comma to a dot in the prices

= 0.5.4 =
* added a setting to use auto_detect_line_endings to solve the problem that the import is seen as ONE big file :D

= 0.5.3 =
* added tax functionality. You can now import tax related stuff. You can now import tax status ( taxable, shipping, none ) and the tax class. The tax class is somehow a but strange. If you have a tax class called 10 RATE it is stored like 10-rate. 

= 0.5.2 =
* Sub categories did not appear when importing, while they where there! This is related to http://wordpress.stackexchange.com/questions/24498/wp-insert-term-parent-child-problem. Problem fixed!

= 0.5.1 =
* small bug fixes because of header already sent when updating plugin

= 0.5 =
* categories can now have children. In the category column you can now do like this: cat1->subcat1->subsubcat1|cat2->subcat2|cat3
* added an option in the settings page to select a field separator
* made a function to check the options on init

= 0.4.1 =
* tags can be imported now as well. You can add one or multiple. In the tag column of the import do like this: tag1|tag2|tag3. Now the product will have 3 tags.
* added the example CSV to the settings page

= 0.4 =
* images can now also be from an URL. In the image fields you can add http://mydomain.com/image1.jpg. You can also mix them!

= 0.3 =
* add setting to handle image imports. You can now choose to delete current images before importing new ones or append the image to the already existing ones
* add the possibility to have multiple images. In the column you can do image1.jpg|image2.jpg|image3.jpg
* solved some minor bugs added some additional checks

= 0.2 =
* added a setting page where you can create the csvimport directory
* fixed a css bug

= 0.1 =

first version.
