$("a[data-toggle=modal]").click(function()
{
  var pageUrl = $(this).attr('content')+'.php';

  $.ajax({
      cache: false,
      type: 'GET',
      url: pageUrl,
      //data: 'EID='+essay_id,
      success: function(data)
      {
          $('#myModal').show();
          $('#myModalBody').html(data);
      }
  });
});
$("document").ready(displayMap);

function displayMap() {
  $("div#mapa").load("map.php");
}
function move(direction) {
  $.ajax({
    cache: false,
    type: 'POST',
    url: 'action.php',
    data: {direction: direction}
    })
    .done(function(data)
    {
      alert(data);
    });
}
