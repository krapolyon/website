$(document).ready(function() {
    $('#francemap').vectorMap({
        map: 'france_fr',
        hoverOpacity: 0.5,
        hoverColor: false,
        backgroundColor: "#ffffff",
        color: "#ED1C82",
        borderColor: "#000000",
        selectedColor: "#FF3EA4",
        enableZoom: true,
        showTooltip: true,
        onRegionClick: function(element, code, region)
        {
            console.log(region);
            $('html,body').animate({scrollTop: $("#"+region).offset().top},'slow');
        },
        onRegionOver: function(element, code, region)
        {
            $("#logocontainer").empty();
            var str = "<table><tr>";
            var cpt = 0;
            
            $("."+region).parent().find("img").each(function(i,el){
            
                if ($(el).parent().parent().is("h2"))
                    return true;                
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