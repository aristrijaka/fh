<?php 


//Custom Heading
if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OT Heading", 'universo'),

   "base"      => "heading",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

      array(

         "type"      => "textarea",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text", 'universo'),

         "param_name"=> "text",

         "value"     => "Heading",

         "description" => __(".", 'universo')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Element Tag', 'universo'),

        "param_name" => "tag",

        "value" => array(   
                     __('Select Tag', 'universo') => '',

                     __('h1', 'universo') => 'h1',

                     __('h2', 'universo') => 'h2',

                     __('h3', 'universo') => 'h3',  

                     __('h4', 'universo') => 'h4',

                     __('h5', 'universo') => 'h5',

                     __('h6', 'universo') => 'h6',  

                     __('p', 'universo')  => 'p',

                     __('div', 'universo') => 'div',
                    ),

        "description" => __("Section Element Tag", 'universo'),      

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Text Align', 'universo'),

        "param_name" => "align",

        "value" => array(   

                     __('Select Align', 'universo') => '',

                     __('left', 'universo') => 'left',

                     __('right', 'universo') => 'right',  

                     __('center', 'universo') => 'center',

                     __('justify', 'universo') => 'justify',
                     
                    ),

        "description" => __("Section Overlay", 'universo'),      

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Font Size", 'universo'),

         "param_name"=> "size",

         "value"     => "",

         "description" => __(".", 'universo')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Color", 'universo'),

         "param_name"=> "color",

         "value"     => "",

         "description" => __(".", 'universo')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Margin Bottom", 'universo'),

         "param_name"=> "bot",

         "value"     => "",

         "description" => __(".", 'universo')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Class Extra", 'universo'),

         "param_name"=> "class",

         "value"     => "",

         "description" => __(".", 'universo')

      ),
    )));

}

// Buttons

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Button", 'universo'),

   "base" => "button",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text", 'universo'),

         "param_name" => "btntext",

         "value" => "",

         "description" => __(".", 'universo')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link", 'universo'),

         "param_name" => "btnlink",

         "value" => '',

         "description" => __(".", 'universo')

      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Style", 'universo'),

         "param_name" => "type",

         "value" => array(   

                     __('Background', 'universo') => 'bg',  

                     __('Border', 'universo') => 'bor',
                    ),

         "description" => __(".", 'universo')

      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Color", 'universo'),

         "param_name" => "color",

         "value" => array(   

                     __('Default', 'universo') => 'default',  

                     __('Primary', 'universo') => 'primary',

                     __('Dark', 'universo') => 'dark',
                    ),

         "description" => __(".", 'universo')

      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Size", 'universo'),

         "param_name" => "size",

         "value" => array(   

                     __('Regular size', 'universo') => 'default',  

                     __('Large', 'universo') => 'large',

                     __('Small', 'universo') => 'small',
                    ),

         "description" => __(".", 'universo')

      ),
      
    )
    ));

}


//Carousel Image

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Carousel Images", 'universo'),
   "base"      => "carouselimg",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Images",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("Upload images.", 'universo')
      ),
      
    )));
}


//Latest Blog

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Latest News", 'universo'),
   "base" => "latestnew",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Post", 'universo'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Show Number Blog Post.", 'universo')
      ),
    )));
}

// Slider Courses

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Slider Events", 'universo'),
   "base" => "sliderevent",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Courses",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'universo'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Label button read more.", 'universo')
      ),  
    )
   ));
}

//Latest Events

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Latest Events", 'universo'),
   "base" => "latestevent",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Post", 'universo'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Show Number Event Post.", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'universo'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Label button read more.", 'universo')
      ), 
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Style Show", 'universo'),

         "param_name" => "type",

         "value" => array(   

                     __('Default', 'universo') => 'style1',  

                     __('With Image', 'universo') => 'style2',
                    ),

         "description" => __(".", 'universo')

      ),    
   )));
}

//Featured Events

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Featured Events", 'universo'),
   "base" => "featuredevent",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Post", 'universo'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Show Number Event Post.", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'universo'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Label button read more.", 'universo')
      ),     
    )));
}

// Slider Courses

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Slider Courses", 'universo'),
   "base" => "slidercourse",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Courses",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'universo'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Label button read more.", 'universo')
      ),  
    )
   ));
}

// Featured Courses

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Featured Courses", 'universo'),
   "base" => "featuredcourse",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Courses",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'universo'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Label button read more.", 'universo')
      ), 
    )
    ));
}

// Latest Courses

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Latest Courses", 'universo'),
   "base" => "latestcourse",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Courses",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Columns", 'universo'),

         "param_name" => "col",

         "value" => array(   

                     __('3 Columns', 'universo') => '3',
                     __('4 Columns', 'universo') => '4',
                     __('2 Columns', 'universo') => '2',
                     __('1 Columns', 'universo') => '1',
                    ),

         "description" => __(".", 'universo')

      ),   
    )
    ));
}

// List Courses

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT List Courses", 'universo'),
   "base" => "listcourse",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Courses",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Label Button",
         "param_name" => "btn",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Button",
         "param_name" => "link",
         "value" => "",
         "description" => __(".", 'universo')
      ),   
    )
    ));
}

//Clients Logo 

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT  Clients Logo", 'universo'),
   "base"      => "logos",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      
    )));
}

//Gallery

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Gallery", 'universo'),
   "base"      => "galleries",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Images Gallery",
         "param_name" => "gallery",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Width", 'universo'),
         "param_name" => "width",
         "value" => "",
         "description" => __("Width of item image.", 'universo')
      ),
    )));
}

//Person

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Person", 'universo'),
   "base" => "persons",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Person Photo",
         "param_name" => "photo",
         "value" => "",
         "description" => __("Avarta of person, Recomended Size: 100 x 100", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name", 'universo'),
         "param_name" => "name",
         "value" => "",
         "description" => __("Person's Name", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Job", 'universo'),
         "param_name" => "job",
         "value" => "",
         "description" => __("Person's job.", 'universo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Description",
         "param_name" => "content",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      array(
         "type"      => "colorpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Background Color Box",
         "param_name"=> "bg",
         "value"     => "",
         "description" => __("Choose color.", 'universo')
      ),
    )));
}

//Learning Material

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Learning Material", 'universo'),
   "base" => "material",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image Left",
         "param_name" => "photo",
         "value" => "",
         "description" => __("Avarta of person, Recomended Size: 100 x 100", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", 'universo'),
         "param_name" => "name",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Author", 'universo'),
         "param_name" => "author",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Description",
         "param_name" => "content",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
    )));
}


// Donation
if(function_exists('vc_map')){
	
	vc_map( array(
   "name" => __("OT Make Donation", 'universo'),
   "base" => "donation",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", 'universo'),
         "param_name" => "text",
         "value" => "",
         "description" => __("Title display in box.", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link", 'universo'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link to make donation.", 'universo')
      ),
      
    )
    ));
}

// Professors

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Professors", 'universo'),
   "base" => "professors",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Professors",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ),   
    )
    ));
}

// Connect

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Connect", 'universo'),
   "base" => "connects",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => "Show Facebook",
         "param_name" => "fb",
         "value" => "",
         "description" => __(".", 'universo')
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => "Show Twitter",
         "param_name" => "tw",
         "value" => "",
         "description" => __(".", 'universo')
      ),   
    )
    ));
}

// Testimonial Slider

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Testimonials", 'universo'),
   "base" => "testslide",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Testimonial",
         "param_name" => "number",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Background Color",
         "param_name" => "bg",
         "value" => "",
         "description" => __(".", 'universo')
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Text Color",
         "param_name" => "color",
         "value" => "",
         "description" => __(".", 'universo')
      ),   
    )
    ));
}

// Social

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => __("OT Social", 'universo'),
   "base" => "socials",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon",
         "param_name" => "icon1",
         "value" => "",
         "description" => __("Add class icon social. Follow link: http://fontawesome.io/icons/", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link", 'universo'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link social.", 'universo')
      ), 
    )
    ));
}


//Google Map

if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Google Map", 'universo'),
   "base" => "ggmap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(  
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("ID Map", 'universo'),
         "param_name" => "idmap",
         "value" => "map-canvas",
         "description" => __("Please enter ID Map, map-canvas1, map-canvas2, map-canvas3, ..etc", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height Map", 'universo'),
         "param_name" => "height",
         "value" => 320,
         "description" => __("Please enter number height Map, 300, 350, 380, ..etc. Default: 420.", 'universo')
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Latitude", 'universo'),
         "param_name" => "lat",
         "value" => -37.817,
         "description" => __("Please enter <a href='http://www.latlong.net/'>Latitude</a> google map", 'universo')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Longitude", 'universo'),
         "param_name" => "long",
         "value" => 144.962,
         "description" => __("Please enter <a href='http://www.latlong.net/'>Longitude</a> google map", 'universo')

      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Zoom Map", 'universo'),
         "param_name" => "zoom",
         "value" => 13,
         "description" => __("Please enter Zoom Map, Default: 15", 'universo')
      ),
    array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Map color", 'universo'),
            "param_name" => "mapcolor",
            "value" => '', //Default White color
            "description" => __("Choose Map color", 'universo')
         ),
     
    array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Map marker",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Icon Map marker, 47 x 68", 'universo')
      ),  
       
    )));

}
 ?>