# Artwork-System

Created as part of assessment for Web Applications Development, with the specification as follows:

Web App Dev Assessment 2: Artwork System
Implement a full web system to support Cara with handling painting orders. As with all specifications there are likely to be elements that are unclear - you should identify these and raise them in tutorials. Clarifications may be made (additions in red, removals in grey).

An immediate start is possible. All HTML, MySQL, PHP, JavaScript and CSS will be covered by week-6 with the base 60% level fully achievable with HTML, MySQL and PHP that has been covered now.

The marks for this are in three parts: 1) you should start by completing the 50% solution then build up to the 60% base solution. Once you have a good 60% solution you should move on to the Art and Safety extras and build up the artistic and technical Impression. 

Base 50% Solutions - Simple Ordering
Implement the following:

A home page for Cara Art that includes a brief description of her and her art with navigation to an art listing page, a track&trace booking page (an empty or simple placeholder page for 50%) and an admin page for Cara.

A database table that contains the name, date of completion, width (mm), height (mm), price (£) and a textual description of each piece of art along with an ID.

A database driven art listing page that:

Lists the current art in the database in an HTML table;
An order button on each row of the table that takes the user to a form for the user to place an order - the order form should include fields for name, phone-number, email, postal-address and should show the name and ID of the selected painting from the table. 
A second database table to store orders with

code to add orders in response to the above form;
an admin page for Cara to view the list of orders  - this should be linked to from the homepage and be password protected with a fixed password letMEin2020.
Pages should pass HTML5 validation tests and be accessible. For the base solution you do not need to do any CSS styling.

60% Improved Base - Still text but getting smarter
Rework the listing so that users are presented with only basic info on paintings (name, price and size). Replace the order button with a “More” button that takes the user to a details page with full details (basic plus description), an order button and a back button. 

Change the art listing page to show 12 paintings per page with next and previous page buttons.

Add a database table and form for track&trace appointment bookings that are now needed for visitors who wish to view the art at her gallery. This should include name, postal-address, phone number and date / time of appointment.. Change Cara’s admin page to show this information as well as orders.

You must complete the improved base (60%) solution to a good level before attempting the extras. Extras can be done in any order.

Art Extra - 10% Adding the art itself
Add images to your art database table. Show thumbnails of the art on the listart.php page along with their title. Show large (⅔ screen roughly) images on the details page. Images should not be stored in files but in the database itself using blobs. You should find sample images on the internet but use only Creative-Commons images.

Safety Extra - 10% Add Error Correction
Add error correction detection and form validation to the order and track&trace forms using best practice combination of HTML5, JavaScript and PHP.

In addition all submissions beyond base 60% will be marked on:

Artistic and Technical Impression - 20%
Style the site to look fresh and artistic. All pages and images should be styled to appear nicely on a wide range of screen sizes. The whole site should have a professional feel.

Add technical elements, e.g. a carousel of AJAX images to the home page or live bookings view for track&trace page. You should be careful in extending not to keep the core functionally as specified.
