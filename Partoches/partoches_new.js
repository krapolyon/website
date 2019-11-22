var yes = "yes";
var no = "no";
var byes = "byes";

var arity = 6;

function AJ() {
	var obj;
	if (window.XMLHttpRequest) obj= new XMLHttpRequest(); 
	else if (window.ActiveXObject){
		try{
			obj= new ActiveXObject('MSXML2.XMLHTTP.3.0');
		}
		catch(er){
			try{
				obj= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(er){
				obj= false;
			}
		}
	}
	return obj;
}

function isExist(morceau, instru) {
	var req= new AJ(); // XMLHttpRequest object
url = "http://krapolyon.free.fr/Partoches/pdf/" + morceau + "-" + instru + ".pdf";
	try {
		req.open("HEAD", url, false);
		req.send(null);		
		return req.status== 200 ? true : false;
	}
	catch (er) {
		alert(url);

		return false;
	}
}

var nouveaux = new Array(
"Fuya","C2C",yes,no,"",no,
"New Aura","Tandu",yes,no,"",no,
"Paranoid","Garbage",yes,no,"",no
);

var reviser = new Array(
//"Madame Oscar", "Mano Negra", yes, yes,
//"Bad Girl", "Donna Summer", yes, yes
//"Can't Stand Losing You", "Sting",  yes, no,
//"Cannonball", "the Breeders", yes, no,
//"La Carioca", "Les Nuls", yes, yes
);

var indispensables = new Array(
"Adele","Adele",yes,no,"tp tb sxs sxm sb bs",yes,
"Balrog Boogie","Diablo Swing Orchestra",yes,yes,"tp tb sxs sxm sb bs",yes,
"Bohemian Rhapsody", "Queen",yes,byes,"tp tb sxs sxm sb bs",yes,
"Canned Heat", "Jamiroquai", yes,byes,"tp tb sxs sxm sb bs",yes,
"Cartilage Holocaust", "Carnival in Coal",yes,yes,"tp tb sxs sxm sb bs",yes,
"Daft Punk","Punk Stupide",yes,byes,"tp tb sxs sxm sb bs",yes,
"D.a.n.c.e", "Justice",yes,byes,"tp tb sxs sxm sb bs",yes,
"Divers Boot","Brasshoppers",yes,yes,"tp tb sxs sxm sb bs",yes,
"Don't Stop the Music","Rihanna",yes,no,"tp tb sxs sxm sb bs",yes,
"Foals","Foals",yes,no,"tp tb sxs sxm sb bs",yes,
"Gangnam","PSY",yes,no,"tp tb sxs sxm sb bs",yes,
"Girls and Boys","Prince",yes,no,"tp tb sxs sxm sb bs",yes,
"Gnossienne","Erik Satie",yes,yes,"tp tb sxs sxm sb bs",yes,
"God put a smile upon your face","Mark Ronson reprend Coldplay",yes,byes,"tp tb sxs sxm sb bs",yes,
"Hybrid Stigmata","Dimmu Borgir",yes,no,"tp tb sxs sxm sb bs",yes,
"Hysteria","Muse",yes,yes,"tp tb sxs sxm sb bs",yes,
"I Feel Love","Bronski Beat",yes,byes,"tp tb sxs sxm sb bs",yes,
"Killing In The Name","Rage Against The Machine",yes,yes,"tp tb sxs sxm sb bs",yes,
"Kinslayer","Nightwish",yes,no,"tp tb sxs sxm sb bs",yes,
"Let's get retarded", "Black Eyed Peas",yes,byes,"tp tb sxs sxm sb bs",yes,
"Le Vent","C.Ringer",yes,no,"tp tb sxs sxm sb bs",yes,
"Life is now","If the Kids+Calvin Harris",yes,no,"tp tb sxs sxm sb bs",yes,
"Life on Mars","David Bowie",yes,no,"tp tb sxs sxm sb bs",yes,
"Mechant","Bambie",yes,yes,"tp tb sxs sxm sb bs",yes,
"Medley Jimmy", "J. Sommerville / Communards",yes,byes,"tp tb sxs sxm sb bs",yes,
"Muscle Museum", "Muse",yes,byes,"tp tb sxs sxm sb bs",yes,
"No one knows","Queen of the stone age",yes,no,"tp tb sxs sxm sb bs",yes,
"Nothing Else Matters","Metallica",yes,byes,"tp tb sxs sxm sb bs",yes,
"Offspring","Des jeunes",yes,byes,"tp tb sxs sxm sb bs",yes,
"Pedigroove", "The GPs",yes,yes,"tp tb sxs sxm sb bs",yes,
"Peephole", "System", yes, yes,"tp tb sxs sxm sb bs",yes,
"Radio Video", "System of a Down",yes,yes,"tp tb sxs sxm sb bs",yes,
"Rodrigo","Gabriella",yes,no,"tp tb sxs sxm sb bs",yes,
"Smack my bitch up","Prodigy",yes,byes,"tp tb sxs sxm sb bs",yes,
"Somebody Someone","Korn",yes,no,"tp tb sxs sxm sb bs",yes,
"Suzy","Caravan Palace",yes,no,"tp tb sxs sxm sb bs",yes,
"Sweet Dreams", "Eurythmics", yes,byes,"tp tb sxs sxm sb bs",yes,
"The Mojo Radio Gang","Parov Stelar",yes,no,"tp tb sxs sxm sb bs",yes,
"The Angry Mob","Kaiser Chiefs",yes,yes,"tp tb sxs sxm sb bs",yes,
"Time is Running Out", "Muse",yes,byes,"tp tb sxs sxm sb bs",yes,
"Toxic", "Britney Spears",yes,byes,"tp tb sxs sxm sb bs",yes,
"Use the Force", "Jamiroquai",yes,yes,"tp tb sxs sxm sb bs",yes,
"Under the Bridge","Red Hot Chili Peppers",yes,no,"tp tb sxs sxm sb bs",yes,
"War","Hypnotic Brass Ensemble",yes,byes,"tp tb sxs sxm sb bs",yes
);

var classiques = new Array(
"Le petit bonhomme en mousse", "P.Sebastien",yes,yes,"",no
);

var saucissons = new Array(
);
var classiques = new Array(
"Use the Force", "Jamiroquai",yes,yes,"tp tb sxs sxm sb bs",yes
);

var saucissons = new Array(
);

var nb_nouveaux = nouveaux.length/arity
var nb_reviser = reviser.length/arity
var nb_indispensables = indispensables.length/arity
var nb_classiques = classiques.length/arity
var nb_saucissons = saucissons.length/arity

function affiche_morceau(nom,auteur,parto,mp3,pdf,mid)
{
document.writeln("<tr>");
document.write("<td  STYLE=\"width:6em\" align=left valign=\"bottom\">");
if(parto=="no")
  { document.write("&nbsp;&nbsp;<em><span class=nomaurice>(pas dispo)</span></em>");}
if(parto=="yes") {
document.write("&nbsp;&nbsp;<a href=\"NWC/");
document.write(nom);

document.writeln(".nwc\" class=maurice>");
document.write("<em>partition</em>");
document.write("</a></td>");
};
//
document.write("<td  STYLE=\"width:6em\" align=left valign=\"bottom\">");
if(mp3=="no")
  { document.write("&nbsp;&nbsp;<em><span class=nomaurice>(pas dispo)</span></em>");}
if(mp3=="yes") {

document.write("&nbsp;&nbsp;<a href=\"mp3/");
document.write(nom);
document.writeln(".mp3\" class=maurice onclick=\"window.open(this.href); return false;\">");
document.write("<em>original</em>");
document.write("</a>");
};

if(mp3=="byes") {
document.write("&nbsp;&nbsp;<a href=\"mp3/");
document.write(nom);
document.writeln(".mp3\" class=maurice>");
document.write("<em>orig.</em>");
document.write("</a>");
//
document.write("<a href=\"mp3/");
document.write(nom);
document.writeln(" 2.mp3\" class=maurice onclick=\"window.open(this.href); return false;\">");
document.write("<em>alt.</em>");
document.write("</a>");
};

document.write("<td  STYLE=\"width:12em\" align=left valign=\"bottom\">");
document.write("<span class=maurice_desc>");

var instru=pdf.split(" ");
for (j=0;j<instru.length;j++)
{
	document.write("<a href=\"pdf/");
	document.write(nom);
    document.writeln("-");
    document.write(instru[j]);
    document.writeln(".pdf\" class=maurice onclick=\"window.open(this.href); return false;\"><em>");
    document.write(instru[j]);
    if(j<instru.length-1) {
    	document.writeln(" - ");
	}
	document.writeln("</em></a>");
}
document.write("</span></td>");

document.write("<td  STYLE=\"width:6em\" align=left valign=\"bottom\">");
document.write("<span class=maurice_desc>");
if(mid=="yes") {
	document.write("<a href=\"mid/");
	document.write(nom);
    document.writeln(".mid\" class=maurice onclick=\"window.open(this.href); return false;\"><em>midi</em></a>");
}
document.write("</span></td>");

//
document.writeln("<td STYLE=\"width:15em\" height=\"25\" align=left valign=\"bottom\">");
document.write("<span class=maurice_desc>");
//espace_rand();
document.write(nom);
document.write("</span></td>");
//
document.write("<td  STYLE=\"width:15em\" align=left valign=\"bottom\">");
document.write("<span class=maurice_desc>");
document.write(auteur);
document.write("</span></td>");
//
document.writeln("</span></td></tr>");
document.writeln();
}

function affiche(t,l)
{
for(i=0;i<l;i++)
{
affiche_morceau(t[arity*i],t[arity*i+1],t[arity*i+2],t[arity*i+3],t[arity*i+4],t[arity*i+5],t[arity*i+6]);
}
}


function titre_rubrique(nom)
{
document.writeln("<tr> <td width=6em></td><td width=6em></td><td width=6em></td><td height=\"40\" width=\"51em\" align=left valign=\"bottom\" colspan=4>");
document.writeln("<span class=gens>");
//document.writeln("<span class=gens> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
document.write(nom);
document.writeln("</span>  </td>   </tr>");
}

