$(document).ready( () => {

    // process each img tag
    $("#image_rollovers img").each( (index, img) => {
   
       // display color image
       $(img).mouseover( function() {
         const src = $(this).attr('src');
         const new_src = src.replace(".jpeg", "-bw.jpeg");
         $(this).attr('src', new_src);
       });
   
       // display bw image
       $(img).mouseout( function() {
         const src = $(this).attr('src');
         const original_src = src.replace("-bw.jpeg", ".jpeg");
         $(this).attr('src', original_src);
       });
       
    });
   
   });
   