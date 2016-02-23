

### 1.0.6 - 26/02/2015

 Changes: 


 * removed rtl this is used automatically


### 1.0.5 - 16/02/2015

 Changes: 


 * Fixed customizer missing sanitization


### 1.0.5 - 16/02/2015

 Changes: 


 * Fixed wp.org review, footer copyright, functions prefixes, text domains, unascaped variables
 * Increased version


### 1.0.4 - 13/02/2015

 Changes: 


 * Issue #17 (Text domain) fixed

Mixed text domains found: “medica_lite"
 * Issue #91 (Title is being displayed twice (Visible in the page source), like so) fixed

Website with a long title | Just another WordPress siteWebsite with a
long title | Just another WordPress site
@robciucioan @robi09 inca au ramas multe probleme aici, reparati mai cu
grija
 * Issue #93 (prefix styles) fixed
 * Issue #93 (prefix styles) fixed

Please prefix custom script and stylesheet handles in
mooveit_lite_wp_enqueue_style_movatique() and
mooveit_lite_wp_enqueue_script_movatique(), like so:
wp_enqueue_style( 'mooveit_lite_style', get_stylesheet_uri(), array(),
'1.5' );

@robi09 @robciucioan
 * Issue #94 (license possible issue) fixed

Icomoon has a number of icon packs under different licenses. You need to
identify the icon pack you used and explicitly provide license.
 * Issues #87 (Customizer panels) and #88 (Upsell Texts - Verificare) fixed

Issue #87:

In customizer frontpage ar trebui sa fie de tip panel, iar apoi setting
boxes pt feature box 1, 2,3 , featured article, latest news ( de unde sa
poate modifica si nr default de posturi )

Issue #88:

@robciucioan verifica te rog la aceasta tema daca upsell's texts sunt
adaugate corect ( ca si la constructzine )
http://awesomescreenshot.com/0cb4ank2b8. Daca nu sunt, sa remediezi.
mersi.
 * Merge pull request #95 from robciucioan/development

Development
 * Issue #10 (Copyright issue) fixed

Tema ar trebui sa contina in dreapta hardcodat : denta lite powered by
wordpress, iar in stanga sa ramana chestia de copyright care poate fi
modificata ( dar cu valoare default in customizer cum am zis )

Formatul ar trebui sa fie la fel ca la restul temelor cu link nofollow
etc.
 * Issue #97 (Escape) fixed

Multiple unescaped options found:
mooveit_lite_header_articletitle
mooveit_lite_header_articleentry
mooveit_lite_header_title - unescaped output in <a href="tel:'.
get_theme_mod( 'mooveit_lite_header_subtitle' )
mooveit_lite_frontpage_secondlybox_content
etc.
 * Issue #100 (Copyright issue) fixed

Tema ar trebui sa contina in dreapta hardcodat : denta lite powered by
wordpress, iar in stanga sa ramana chestia de copyright care poate fi
modificata ( dar cu valoare default in customizer cum am zis )

Formatul ar trebui sa fie la fel ca la restul temelor cu link nofollow
etc.
 * Issue #98 (Prefix custom stylesheet) fixed

pai trebuie si pt nivo lightbox, font etc, scripts, ar trebuie
mooveit_lite_scripts, mooveit_lite_html5shiv etc
 * Issues #96 fixed

in single.php, search.php, page-blog.php, index.php, archive.php trebuie
adaugat text domain si acolo unde se afiseaza nr de comentarii

in descrierea din style.css, apare ceva de genul "We built Virtue with a
powerful ...". banuiesc, ca ar trebui sa fie numele temeie, Mooveit Lite
in loc de Virtue.

cred ar trebui traduse si valorile default pentru variabilele din
customizer, atunci cand sunt afisate, gen in page-home.php

in customizer.php la linia 541 inca este text domain 'ti' , iar de la
linia 680 pana la 692 apare 'denta_lite'; acelasi lucru in 404.php ,
apare denta_lite; in custom-functions.php apare shape ca text domain

in footer.php nu e tradus 'Prowdly powered by..'

-mie personal, mi se pare ciudat , cum a-ti facut cu logo/titlu si
descriere in header cu acel checkbox

Please prefix custom script and stylesheet handles in
mooveit_lite_wp_enqueue_style_movatique() and
mooveit_lite_wp_enqueue_script_movatique(), like so:
wp_enqueue_style( 'mooveit_lite_style', get_stylesheet_uri(), array(),
'1.5' );
Aici e facut doar pt style.css, ar trebui pt toate css-urile si js-urile
incluse

in customizer, a-ti folosit panel-uri, si poate ar fi bine sa puneti
conditii cum e la zerif, gen, daca exista clasa pt panel-uri, puneti
panel, altfel fara panel, pt versiunile mai vechi de wp

tot in customizer, pt frontpage, la Featured box, eu as fi facut separat
pt fiecare box in parte. asa mi se par ingramadite. De asemenea, puteti
pune si conditional, sa apara doar pe prima pagina

nu se poate seta nr default de posturi la latest news

si nu am reusit sa afisez nicaieri box-urile alea si latest news de pe
prima pagina, nici daca am setata o pagina ca fp, nici latest news. Nu
inteleg cum functioneaza

Daca vi se par ok, ce am spus, puteti sa mai faceti issue-uri pt ele,
daca sunt in plus
 * Issue #96 (Development) fixed

pff nu e ok, uitete la zerif de ex, sau cum a facut rodica la denta. Ce
au zis eu cu front page este ca nu afisam latest news sau ca nu mergea
sa setezi o pagina ca home, si medica ar trebui sa mearga la fel si
toate temele
 * Issue #96 (Development) fixed

Am inlocuit "get_template_part" cu "include".
 * Issue #104 (Latest news customizer) fixed

Adaugare checkbox pentru latest news + conditie.
 * Merge pull request #102 from robciucioan/development

Development
 * Rename template pages to template-name.php, added link to the theme in footer, remove unused similar-articles.php


### 1.0.4 - 28/01/2015

 Changes: 


 * Update style.css
