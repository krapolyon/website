var yes = "yes";
var no = "no";
var byes = "byes";

var arity = 4

var nouveaux = new Array(
"Fuya","C2C",yes,no,
"New Aura","Tandu",yes,no,
"Paranoid","Garbage",yes,no
);

var reviser = new Array(
//"Madame Oscar", "Mano Negra", yes, yes,
//"Bad Girl", "Donna Summer", yes, yes
//"Can't Stand Losing You", "Sting",  yes, no,
//"Cannonball", "the Breeders", yes, no,
//"La Carioca", "Les Nuls", yes, yes
);

var indispensables = new Array(
"Adele","Adele",yes,no,
"Balrog Boogie","Diablo Swing Orchestra",yes,yes,
"Bohemian Rhapsody", "Queen",yes,byes,
"Canned Heat", "Jamiroquai", yes,byes,
"Cartilage Holocaust", "Carnival in Coal",yes,yes,
"Daft Punk","Punk Stupide",yes,byes,
"D.a.n.c.e", "Justice",yes,byes,
"Divers Boot","Brasshoppers",yes,yes,
"Don't Stop the Music","Rihanna",yes,no,
"Foals","Foals",yes,no,
"Gangnam","PSY",yes,no,
"Girls and Boys","Prince",yes,no,
"Gnossienne","Erik Satie",yes,yes,
"God put a smile upon your face","Mark Ronson reprend Coldplay",yes,byes,
"Hybrid Stigmata","Dimmu Borgir",yes,no,
"Hysteria","Muse",yes,yes,
"I Feel Love","Bronski Beat",yes,byes,
"Killing In The Name","Rage Against The Machine",yes,yes,
"Kinslayer","Nightwish",yes,no,
"Let's get retarded", "Black Eyed Peas",yes,byes,
"Le Vent","C.Ringer",yes,no,
"Life is now","If the Kids+Calvin Harris",yes,no,
"Life on Mars","David Bowie",yes,no,
"Mechant","Bambie",yes,yes,
"Medley Jimmy", "J. Sommerville / Communards",yes,byes,
"Muscle Museum", "Muse",yes,byes,
"No one knows","Queen of the stone age",yes,no,
"Nothing Else Matters","Metallica",yes,byes,
"Offspring","Des jeunes",yes,byes,
"Pedigroove", "The GPs",yes,yes,
"Peephole", "System", yes, yes,
"Radio Video", "System of a Down",yes,yes,
"Rodrigo","Gabriella",yes,no,
"Smack my bitch up","Prodigy",yes,byes,
"Somebody Someone","Korn",yes,no,
"Suzy","Caravan Palace",yes,no,
"Sweet Dreams", "Eurythmics", yes,byes,
"The Mojo Radio Gang","Parov Stelar",yes,no,
"The Angry Mob","Kaiser Chiefs",yes,yes,
"Time is Running Out", "Muse",yes,byes,
"Toxic", "Britney Spears",yes,byes,
"Use the Force", "Jamiroquai",yes,yes,
"Under the Bridge","Red Hot Chili Peppers",yes,no,
"War","Hypnotic Brass Ensemble",yes,byes
);

var classiques = new Array(
"Le petit bonhomme en mousse", "P.Sebastien",yes,yes
);

var saucissons = new Array(
);

var nb_nouveaux = nouveaux.length/arity
var nb_reviser = reviser.length/arity
var nb_indispensables = indispensables.length/arity
var nb_classiques = classiques.length/arity
var nb_saucissons = saucissons.length/arity

function affiche_morceau(nom,auteur,parto,mp3)
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
document.writeln(".mp3\" class=maurice>");
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
document.writeln(" 2.mp3\" class=maurice>");
document.write("<em>alt.</em>");
document.write("</a>");
};
//
document.writeln("<td STYLE=\"width:18em\" height=\"25\" align=left valign=\"bottom\">");
document.write("<span class=maurice_desc>");
//espace_rand();
document.write(nom);
document.write("</span></td>");
//
document.write("<td  STYLE=\"width:18em\" align=left valign=\"bottom\">");
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
affiche_morceau(t[arity*i],t[arity*i+1],t[arity*i+2],t[arity*i+3]);
}
}


function titre_rubrique(nom)
{
document.writeln("<tr> <td width=6em></td><td width=6em></td><td height=\"40\" width=\"18em\" align=left valign=\"bottom\">");
document.writeln("<span class=gens>");
//document.writeln("<span class=gens> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
document.write(nom);
document.writeln("</span>  </td>   </tr>");
}

