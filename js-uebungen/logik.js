/* Erklärung zu "undefine, false und ? im Buch nachschlagen" */

var ganzZahl = 4;

//console.log('Hallo'+' '+ganzZahl);

ganzZahl = 5;
console.log(ganzZahl);

ganzZahl = 5 + 4;
////console.log(ganzZahl);

ganzZahl = ganzZahl + 1;
//console.log (ganzZahl);

ganzZahl = 4 + ganzZahl * 2.5;
//console.log(ganzZahl);

var aufsteigendeZahl = 1;
//console.log(aufsteigendeZahl);

aufsteigendeZahl++;
//console.log (aufsteigendeZahl);

var absteigendeZahl = 10;
absteigendeZahl--;
//console.log(absteigendeZahl);

var ZahlAlsText = '3e';
//console.log(ZahlAlsText);
//console.log(typeof ZahlAlsText);
ZahlAlsText = parseInt(ZahlAlsText);
//console.log (ZahlAlsText);

//console.log (ZahlAlsText * 3);

//mit "typeof" kann man in der Console checken um welchen Typ es sich handelt

var number1 = 2;
var number2 = 7;

//console.log (number1 * number2);

var spruch = 'Hallo, ';
console.log(spruch);

spruch = spruch + 'Welt!';
console.log(spruch);

spruch = '-=[' + spruch + ']=-';
console.log(spruch);

// einfaches Anführungszeichen braucht weniger Bit, aber nix mischen 

var inputFeld1 = '<input type="text" value="test" />';

var inputFeld2 = "<input type=\"text\" value=\"test\">";

//console.log(inputFeld1, inputFeld2);

//window.alert(spruch);

//document.write('Hallo ');
//document.write ('<br>ich bin eine neue Code-Zeile');

var farben= [
    'rot', 
    'gelb', 
    'grün'
];
//console.log(farben[2]);

//console.log(farben.join (' / '));

var katalog = [
    'Inhaltsverzeichnis',
    ['Absatz 1','Absatz 2'],
    'Kapitel 2',
    'Kapitel 3'
];
//console.log(katalog);

katalog.pop(); //letzte Stelle wird gelöscht
katalog.push ('Kapitel 5'); //wird als neuer Eintrag an die letzte Stelle gesetzt


//console.log(katalog);

//console.log(katalog[1][0]);

var neuesArrays = [];
console.log(neuesArrays[0]);

katalog [0] = katalog[0] + ' NEU';
//console.log(katalog);

var speicherplatzzugriffsname = 'groesse';

var ich = {

    vorname: 'Roland',
    nachname: 'Kaltenböck',
    groesse: '184cm',
    alter: 32,

    kopf: {
        augen: 'grün',
        haare: 'dunkelbraun'
    }
};

//console.log('Hallo, ich bin ' + ich.vorname + '!');
//console.log('Aktuell bin ich ' + ich.alter + ' Jahre alt');
//console.log('Meine Augen haben die Farbe ' + ich.kopf.augen);
//console.log(ich[speicherplatzzugriffsname]);

const USER_NAME = 'Roland';
console.log(USER_NAME);

//alles in geschwungenen Klammern wird nicht durch außen geändert

var example1 = 'hui!';

{
    let example1 = 'jump!';
    console.log(example1);
}

//console.log(example1);