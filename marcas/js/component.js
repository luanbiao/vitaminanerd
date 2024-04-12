if(window.location.protocol == 'file:'){
  alert('To test this demo properly please use a local server such as XAMPP or WAMP. See README.md for more details.');
}

var resizeableImage = function(image_target) {
  // Some variable and settings
  var $container,
      orig_src = new Image(),
     image_target = $(image_target).get(0),
	 // image_target = $json_encode("imagem_final", JSON_HEX_TAG); ?>; //Don't forget the extra semicolon!
      event_state = {},
      constrain = false,
      min_width = 30, // Change as required
      min_height = 30,
      max_width = 1076, // Change as required
      max_height = 803,
      resize_canvas = document.createElement('canvas');

  init = function(){

    // When resizing, we will always use this copy of the original as the base
    orig_src.src=image_target.src;

    // Wrap the image with the container and add resize handles
    $(image_target).wrap('<div class="resize-container"></div>')
    .before('<span class="resize-handle resize-handle-nw"></span>')
    .before('<span class="resize-handle resize-handle-ne"></span>')
    .after('<span class="resize-handle resize-handle-se"></span>')
    .after('<span class="resize-handle resize-handle-sw"></span>');

    // Assign the container to a variable
    $container =  $(image_target).parent('.resize-container');

    // Add events
    $container.on('mousedown touchstart', '.resize-handle', startResize);
    $container.on('mousedown touchstart', 'img', startMoving);
    $('.js-crop').on('click', crop);
	$('.js-crop2').on('click', crop2);
	$('.js-crop3').on('click', crop3);
	$('.js-crop4').on('click', crop4);
	$('.js-crop5').on('click', crop5);
	$('.js-crop6').on('click', crop6);
	$('.js-crop7').on('click', crop7);
	$('.js-crop8').on('click', crop8);
	$('.js-crop9').on('click', crop9);
	$('.js-crop10').on('click', crop10);
  };

  startResize = function(e){
    e.preventDefault();
    e.stopPropagation();
    saveEventState(e);
    $(document).on('mousemove touchmove', resizing);
    $(document).on('mouseup touchend', endResize);
  };

  endResize = function(e){
    e.preventDefault();
    $(document).off('mouseup touchend', endResize);
    $(document).off('mousemove touchmove', resizing);
  };

  saveEventState = function(e){
    // Save the initial event details and container state
    event_state.container_width = $container.width();
    event_state.container_height = $container.height();
    event_state.container_left = $container.offset().left; 
    event_state.container_top = $container.offset().top;
    event_state.mouse_x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft(); 
    event_state.mouse_y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();
	
	// This is a fix for mobile safari
	// For some reason it does not allow a direct copy of the touches property
	if(typeof e.originalEvent.touches !== 'undefined'){
		event_state.touches = [];
		$.each(e.originalEvent.touches, function(i, ob){
		  event_state.touches[i] = {};
		  event_state.touches[i].clientX = 0+ob.clientX;
		  event_state.touches[i].clientY = 0+ob.clientY;
		});
	}
    event_state.evnt = e;
  };

  resizing = function(e){
    var mouse={},width,height,left,top,offset=$container.offset();
    mouse.x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft(); 
    mouse.y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();
    
    // Position image differently depending on the corner dragged and constraints
    if( $(event_state.evnt.target).hasClass('resize-handle-se') ){
      width = mouse.x - event_state.container_left;
      height = mouse.y  - event_state.container_top;
      left = event_state.container_left;
      top = event_state.container_top;
    } else if($(event_state.evnt.target).hasClass('resize-handle-sw') ){
      width = event_state.container_width - (mouse.x - event_state.container_left);
      height = mouse.y  - event_state.container_top;
      left = mouse.x;
      top = event_state.container_top;
    } else if($(event_state.evnt.target).hasClass('resize-handle-nw') ){
      width = event_state.container_width - (mouse.x - event_state.container_left);
      height = event_state.container_height - (mouse.y - event_state.container_top);
      left = mouse.x;
      top = mouse.y;
      if(constrain || e.shiftKey){
        top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
      }
    } else if($(event_state.evnt.target).hasClass('resize-handle-ne') ){
      width = mouse.x - event_state.container_left;
      height = event_state.container_height - (mouse.y - event_state.container_top);
      left = event_state.container_left;
      top = mouse.y;
      if(constrain || e.shiftKey){
        top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
      }
    }
	
    // Optionally maintain aspect ratio
   
      height = width / orig_src.width * orig_src.height;
  

    if(width > min_width && height > min_height && width < max_width && height < max_height){
      // To improve performance you might limit how often resizeImage() is called
      resizeImage(width, height);  
      // Without this Firefox will not re-calculate the the image dimensions until drag end
      $container.offset({'left': left, 'top': top});
    }
  }

  resizeImage = function(width, height){
    resize_canvas.width = width;
    resize_canvas.height = height;
    resize_canvas.getContext('2d').drawImage(orig_src, 0, 0, width, height);   
    $(image_target).attr('src', resize_canvas.toDataURL("image/png"));  
  };

  startMoving = function(e){
    e.preventDefault();
    e.stopPropagation();
    saveEventState(e);
    $(document).on('mousemove touchmove', moving);
    $(document).on('mouseup touchend', endMoving);
  };

  endMoving = function(e){
    e.preventDefault();
    $(document).off('mouseup touchend', endMoving);
    $(document).off('mousemove touchmove', moving);
  };

  moving = function(e){
    var  mouse={}, touches;
    e.preventDefault();
    e.stopPropagation();
    
    touches = e.originalEvent.touches;
    
    mouse.x = (e.clientX || e.pageX || touches[0].clientX) + $(window).scrollLeft(); 
    mouse.y = (e.clientY || e.pageY || touches[0].clientY) + $(window).scrollTop();
    $container.offset({
      'left': mouse.x - ( event_state.mouse_x - event_state.container_left ),
      'top': mouse.y - ( event_state.mouse_y - event_state.container_top ) 
    });
    // Watch for pinch zoom gesture while moving
    if(event_state.touches && event_state.touches.length > 1 && touches.length > 1){
      var width = event_state.container_width, height = event_state.container_height;
      var a = event_state.touches[0].clientX - event_state.touches[1].clientX;
      a = a * a; 
      var b = event_state.touches[0].clientY - event_state.touches[1].clientY;
      b = b * b; 
      var dist1 = Math.sqrt( a + b );
      
      a = e.originalEvent.touches[0].clientX - touches[1].clientX;
      a = a * a; 
      b = e.originalEvent.touches[0].clientY - touches[1].clientY;
      b = b * b; 
      var dist2 = Math.sqrt( a + b );

      var ratio = dist2 /dist1;

      width = width * ratio;
      height = height * ratio;
      // To improve performance you might limit how often resizeImage() is called
      resizeImage(width, height);
    }
  };



//Anime e Mangás 

 crop = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Animes_Mangas.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}
// Filmes
  crop2 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Filmes.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

// Games
  crop3 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Games.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}
// Livros
  crop4 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Livros.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

// Moda
  crop5 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Moda.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

// Quadrinhos e HQ
  crop6 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Quadrinhos_Hq.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

// Series

  crop7 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Series.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}
// Tecnologia
  crop8 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Tecnologia.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

// Podcast | Eventos | Promoções | Curiosidades
  crop9 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/Eventos_Promocoes_Podcast.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}
  
  // BGS
  crop10 = function(){
   var crop_canvas,
        left = $('.overlay').offset().left - $container.offset().left,
        top =  $('.overlay').offset().top - $container.offset().top,
        width = $('.overlay').width(),
        height = $('.overlay').height();
	
    crop_canvas = document.createElement('canvas');
    crop_canvas.width = width;
    crop_canvas.height = height;
    crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
    var img = crop_canvas.toDataURL("image/png");
	
     //edicao
	 var canvas = document.getElementById("canvas");
     var ctx = canvas.getContext("2d");
 	 var img1 = loadImage(img, main);
	 var img2 = loadImage('img/bgs.png', main);
	var imagesLoaded = 0;
	function main() {
		imagesLoaded += 1;
		if(imagesLoaded == 2) {
        ctx.drawImage(img1, 0, 0);
        ctx.drawImage(img2, 0, 0);
    }
}
function loadImage(src, onload) {
    var img = new Image();
    img.onload = onload;
    img.src = src;
    return img;
}
}

  init();
};

// Kick everything off with the target image
resizeableImage($('.resize-image'));