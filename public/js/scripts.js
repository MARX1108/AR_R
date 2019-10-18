$(document).ready(function(){

  // event handler for upvote button
  $('.btn-upvote').click(function(){
    // console.log('upvote button clicked');
    //var score = $(this).parent().find('h3.score').eq(0).text();
    var score = $(this).siblings('h3.score').eq(0).text();
    score = parseInt(score) + 1;
    $(this).siblings('h3.score').eq(0).text(score);
    console.log(score);

    $('div.success').remove(); // remove any existing success boxes
    var success = $('<div class="success">Your upvote has been recorded.</div>');
    $('#news').prepend(success);
  });

  // event handler for downvote button
  $('.btn-downvote').click(function(){
    var score = $(this).siblings('h3.score').eq(0).text(); // get current score
    score = parseInt(score) - 1; // decrease score by one
    $(this).siblings('h3.score').eq(0).text(score); // update score
    console.log(score);
  });

  // bubbling example
  //$('div').click(function(){
  //  $(this).css('background-color','green');
  //});

  //$('div.score-box').click(function(e){
  //  e.stopPropagation();
  //  $(this).css('background-color','green');
  //});

});
