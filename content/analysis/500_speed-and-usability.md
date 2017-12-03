Kmom05
==========

Jag valde två sidor som jag besökt nyligen. Sen tipsade min flickvän om en sida som hon tyckte var långsam.

Jag har använt mig av Google Pagespeed för att ge ett betyg åt sidornas hastigheter.
Sen använde jag Devtools i Safari till att mäta sidornas laddningstid, antal resurser och totala storlek.
I Devtools laddade jag sidorna tre gånger och räknade ut snittvärdena.
Jag använde cmd-opt-r för att ladda utan cachade filer.

[Excel-ark](speed-test.xlsx)


###Prisjakt
[FIGURE src="image/analysis/prisjakt.png?h=360" class="no-border"]

|                                                                | Betyg Mobil | Betyg Dator | Laddningstid devtools | Anatal resurser | Total storlek |
| -------------------------------------------------------------- | :---------: |:------------| :---------------------|:----------------| :-------------|
| [prisjakt.nu](https://www.prisjakt.nu)                         | 66          | 68          | 0,88s                 | 87              | 1,42MB        |
| [top100](https://www.prisjakt.nu/kategori.php?k=v100)          | 62          | 67          | 0,87s                 | 85              | 1,92MB        |
| [produkt](https://www.prisjakt.nu/produkt.php?p=4471962)       | 57          | 67          | 0,65s                 | 66              | 1,70MB        |

Jag tycker sidan redan var tillräckligt snabb. Alla bild-filer var väldigt små.


###MacRumors
[FIGURE src="image/analysis/macrumors.png?h=360" class="no-border"]

|                                               | Betyg Mobil | Betyg Dator | Laddningstid devtools | Anatal resurser | Total storlek |
| --------------------------------------------- | :---------: |:------------| :---------------------|:----------------| :-------------|
| [macrumors.com](https://www.macrumors.com)    | 54          | 64          | 2,40s                 | 148             | 5,76MB        |
| [forum](https://forums.macrumors.com)         | 58          | 68          | 1,88s                 | 118             | 2,34MB        |
| [iOS Blog](https://www.macrumors.com/iphone/) | 54          | 68          | 3,66s                 | 190             | 12,6MB        |

De skulle kunna komprimera vissa bilder för att få ner laddningstiden. De använder också väldigt många skript som kanske kan optimeras.


###Kicks
[FIGURE src="image/analysis/kicks.png?h=360" class="no-border"]

|                                               | Betyg Mobil | Betyg Dator | Laddningstid devtools | Anatal resurser | Total storlek |
| --------------------------------------------- | :---------: |:------------| :---------------------|:----------------| :-------------|
| [kicks.se](https://www.kicks.se)              | 46          | 35          | 3,25s                 | 97              | 4,09MB        |
| [nyheter](https://www.kicks.se/nyheter)       | 65          | 76          | 1,38s                 | 59              | 1,65MB        |
| [julklappar](https://www.kicks.se/julklappar) | 83          | 83          | 2,47s                 | 80              | 2,03MB        |

Framförallt förstasidan var väldigt långsam. Den innehöll många stora bild-filer som skulle behöva komprimeras.


###Sammanfattning

Den vanligaste förbättringsåtgärden verkar vara att minska bildstorlekarna.
Onödigt stora bild-filer där det inte behövs ger långa laddningstider.

1. [prisjakt.nu](https://www.prisjakt.nu)
2. [macrumors.com](http://macrumors.com)
3. [kicks.se](https://www.kicks.se)   

Bäst resultat fick prisakt. Sidan gick väldigt snabbt att ladda.

Jag tycker att runt en sekund räknas som snabb laddningstid. Tar det längre tid blir man ofta irriterad.
Prisjakt var den enda sidan som klarade testet. De andra sidorna tog aningen för lång tid att ladda.

Jag har arbetat själv.
