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

"Bad Guy","Billie Eilish",yes,"https://www.youtube.com/watch?v=DyDfgMOUjCI","tp tb sxs sxm sb bs",yes,
"La vague","Izia",yes,"https://www.youtube.com/watch?v=DtXehkdSd6w","tp tb sxs sxm sb bs",yes
);

var reviser = new Array(
//"Madame Oscar", "Mano Negra", yes, yes,
//"Bad Girl", "Donna Summer", yes, yes
//"Can't Stand Losing You", "Sting",  yes, no,
//"Cannonball", "the Breeders", yes, no,
//"La Carioca", "Les Nuls", yes, yes
);

var indispensables = new Array(
"8 bit","Adhesive Wombat",yes,"https://www.youtube.com/watch?v=0HxZn6CzOIo","tp tb sxs sxm sb bs",yes,
"Biffy","Biffy",yes,"https://www.youtube.com/watch?v=mR9HdYx4U2E","tp tb sxs sxm sb bs",yes,
"Bonfire","Knife Party",yes,"https://www.youtube.com/watch?v=e-IWRmpefzE","tp tb sxs sxm sb bs",yes,
"Canned Heat", "Jamiroquai", yes,"https://www.youtube.com/watch?v=vE4VlA_9OrI","tp tb sxs sxm sb bs",yes,
"Come","Jain",yes,"https://www.youtube.com/watch?v=ZdOlnw7z46w","tp tb sxs sxm sb bs",yes,
"Daft Punk","Punk Stupide",yes,"https://www.youtube.com/watch?v=DpPueG9Fkxs","tp tb sxs sxm sb bs",yes,
"D.a.n.c.e", "Justice",yes,"https://www.youtube.com/watch?v=sy1dYFGkPUE","tp tb sxs sxm sb bs",yes,
"Day Break","Overwerk",yes,"https://www.youtube.com/watch?v=A3PDXmYoF5U","tp tb sxs sxm sb bs",yes,
"Foals","Foals",yes,"https://www.youtube.com/watch?v=ARu_XbUg8bo","tp tb sxs sxm sb bs",yes,
"Fuya","C2C",yes,"http://www.youtube.com/watch?v=1KOaT1vdLmc","tp tb sxs sxm sb bs",yes,
"Ghost in the Shell","Medley BO",yes,"https://www.youtube.com/watch?v=ZtzMskOJgHA","tp tb sxs sxm sb bs",yes,
"Giorgio","Daft Punk",yes,"https://www.youtube.com/watch?v=zhl-Cs1-sG4","tp tb sxs sxm sb bs",yes,
"Gnossienne","Erik Satie",yes,"https://www.youtube.com/watch?v=oOTpQpoHHaw","tp tb sxs sxm sb bs",yes,
"Going the Distance","Rocky Balboa",yes,"https://www.youtube.com/watch?v=GvQkl7qa6RQ","tp tb sxs sxm sb bs",yes,
"Helicopter","Bloc Party",yes,"https://www.youtube.com/watch?v=alDv4O0gHKA","tp tb sxs sxm sb bs",yes,
"Hybrid Stigmata","Dimmu Borgir",yes,"https://www.youtube.com/watch?v=qfag4mJBixo","tp tb sxs sxm sb bs",yes,
"Lone Digger","Caravan Palace",yes,"https://www.youtube.com/watch?v=UbQgXeY_zi4","tp tb sxs sxm sb bs",yes,
"Magnolias forever","Cloclo",yes,"https://www.youtube.com/watch?v=FfA7LLtE7e4","tp tb sxs sxm sb bs",yes,
"Major Lazer","Medley",yes,"https://www.youtube.com/watch?v=8kKWRPgM-1c","tp tb sxs sxm sb bs",yes,
"Medley Jimmy", "J. Sommerville / Communards",yes,"https://www.youtube.com/watch?v=2_BNL15OVhM","tp tb sxs sxm sb bs",yes,
"MEGAMAN","Dr Wily's Castle",yes,"https://www.youtube.com/watch?v=VLu0eE6w_2c","tp tb sxs sxm sb bs",yes,
"Nothing Else Matters","Metallica",yes,"https://www.youtube.com/watch?v=Tj75Arhq5ho","tp tb sxs sxm sb bs",yes,
"Pressure in my head","Muse et Qotsa",yes,"https://www.youtube.com/watch?v=h2eKImKZviw","tp tb sxs sxm sb bs",yes,
"Radio Video", "System of a Down",yes,"https://www.youtube.com/watch?v=qIDzPUt20F4","tp tb sxs sxm sb bs",yes,
"Rodrigo","Gabriella",yes,"https://www.youtube.com/watch?v=PT9hvyDvKHA","tp tb sxs sxm sb bs",yes,
"Schrodinger","Anakronic Electro Orkestra",yes,"https://www.youtube.com/watch?v=k3rS4c4WPns","tp tb sxs sxm sb bs",yes,
"Somebody Someone","Korn",yes,"https://www.youtube.com/watch?v=FBEE-t-uyI0","tp tb sxs sxm sb bs",yes,
"Starlight","Supermen Lovers",yes,"https://www.youtube.com/watch?v=h61QG4s0I3U","tp tb sxs sxm sb bs",yes,
"Starman","Zizi Poussière d'étoiles",yes,"https://www.youtube.com/watch?v=sI66hcu9fIs","tp tb sxs sxm sb bs",yes,
"Sur la planche","La Femme",yes,"https://www.youtube.com/watch?v=NwVA5zYfNWw","tp tb sxs sxm sb bs",yes,
"The Age Of The Understatement","The Last Shadow Puppets",yes,"https://www.youtube.com/watch?v=XGV8xCkpXjE","tp tb sxs sxm sb bs",yes,
"The Bay","Metronomy",yes,"https://www.youtube.com/watch?v=9PnOG67flRA","tp tb sxs sxm sb bs",yes,
"Thunderstruck","ACDC",yes,"https://www.youtube.com/watch?v=e4Ao-iNPPUc","tp tb sxs sxm sb bs",yes,
"Toccata","Overwerk",yes,"https://www.youtube.com/watch?v=ycfM6XGBE30","tp tb sxs sxm sb bs",yes,
"Tous les memes","Stromae",yes,"https://www.youtube.com/watch?v=CAMWdvo71ls","tp tb sxs sxm sb bs",yes,
"Turbo Killer","Carpenter Brut",yes,"https://www.youtube.com/watch?v=er416Ad3R1g","tp tb sxs sxm sb bs",yes,
"Uptown Funk","Mark Ronson",yes,"https://www.youtube.com/watch?v=OPf0YbXqDm0","tp tb sxs sxm sb bs",yes,
"Under the Bridge","Red Hot Chili Peppers",yes,"https://www.youtube.com/watch?v=lwlogyj7nFE","tp tb sxs sxm sb bs",yes,
"Vulfpeck","Le rotary conscience",yes,"https://www.youtube.com/watch?v=LqBOzFqpZzM","tp tb sxs sxm sb bs",yes,
"War","Hypnotic Brass Ensemble",yes,"https://www.youtube.com/watch?v=ZfeesZHAugY","tp tb sxs sxm sb bs",yes
);

var classiques = new Array(
"Toxic","Britney",yes,"https://www.youtube.com/watch?v=e4Ao-iNPPUc","tp tb sxs sxm sb bs",yes,
"Muscle Museum","Muse",yes,"https://www.youtube.com/watch?v=h61QG4s0I3U","tp tb sxs sxm sb bs",yes,
"Time is Running Out","Muse 2",yes,"https://www.youtube.com/watch?v=h61QG4s0I3U","tp tb sxs sxm sb bs",yes
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
else if(mp3=="yes") {

document.write("&nbsp;&nbsp;<a href=\"mp3/");
document.write(nom);
document.writeln(".mp3\" class=maurice onclick=\"window.open(this.href); return false;\">");
document.write("<em>original</em>");
document.write("</a>");
}
else if(mp3=="byes") {
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
}
else {

	document.write("&nbsp;&nbsp;<a onclick=\"window.open(this.href); return false;\" href=\"");
	document.write(mp3);
	document.writeln("\" class=maurice>");
	document.write("<em>youteub</em>");
	document.write("</a>");
}

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

