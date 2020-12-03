//true
if(typeof 'Apfel' == 'string') {

}

//true
if( 1 > 0 ) {

}
if( 0 > 1 ) {

}

//true
if( 1 == 1 ) {

}

//true
if( 0<=1 ) {

}

//false
if( 0 >= 1 ) {

}

//true
if ( 0 != 1 ) {

}

//true
if (!(0 == 1 )) {

}

//false
if( (1 < 5) && (9 == 14) ) {

}

//true
if( (1 < 5 || 9 == 14) ) {

}

//true, da das ODER das erste zutreffende akzeptiert und alles nachstehende ignoriert
if( 1 == 1 || 2 > 1 || 4 == 6 ) {

}

//false
if ( 2 == 2 && 3 == 2 || 1 == 5){

}

//true
if( ( 2 > 1 && 4 == 6) || 1 == 1) {

}

//false
if (2 == 2 && 3 == 2 || 1 == 5){

}

//false
if( 'Name' == 'Name2' ) {

}

//false
if( 'Name'.lenght < 4 ){

}

// = 4, daher true
if( 'Name'.length > 3 ){

}

//true
if( 'Roland' .indexOf('y') == -1 ){

}

//true
if( 'Roland' .indexOf('a') == 3){

}


let vorname = 'Qendrim';

switch ( vorname ) {
    case 'Roland':
        console.log('Ich bin Netflix Fan');
        break;

    case 'Qendrim':
        console.log('Ich habe Coding für mich entdeckt');
        break;

    default: 
        console.log('alles halb so schlimm');
}