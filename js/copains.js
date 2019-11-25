$(document).ready(function() {

  $('#francemap').vectorMap({
    map: 'france_fr',
    hoverOpacity: 0.5,
    hoverColor: false,
    backgroundColor: "#ffffff",
    color: "#ED1C82",
    colors: {
      "FR-69": '#a21100'
      },
    borderColor: "#000000",
    selectedColor: "#FF3EA4",
    enableZoom: true,
    showTooltip: true,
    onRegionClick: function(element, code, region)
    {
      $('html,body').animate({scrollTop: $("#"+code).offset().top},'slow');
    },
    onRegionOver: function(element, code, region)
    {
      $("#logocontainer").empty();
      var str = "<table><tr>";
      var cpt = 0;

      $("#"+code).find("img").each(function(i,el){

        if (cpt%3 == 0)
          str += "</tr><tr>";

        str+="<td style='border: 3px solid white;'><img src='"+$(el).attr("src")+"' style='height:150px;margin;10px;'/><br/><td>";
        cpt++;

      });

      str+="</tr></table>";

      $("#logocontainer").append(str);
    }

  });


  $("#francemap").css("background-color","#232323");
  $('.jqvmap-zoomin').hide();
  $('.jqvmap-zoomout').hide();
  $("#vomix").raptorize();
});

