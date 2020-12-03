let userNamefromDataBase = '';

function saymyName (name) {

    if(checkMyInput(name) == true){
        console.log('Your name is: ' + name);
    }
    //console.log ('Your name is '+ name);
}

saymyName('Roland');
saymyName('Bernhard');
saymyName('Bronto');
saymyName('Fintch');

saymyName(userNamefromDataBase);


function checkMyInput(input) {
    if( typeof input == 'string' ) {
        //console.log('yes, it is a string');
        return true;
    }
    else {
        //console.log('Ya Input is not a Name or a String');
        return false;
    }
}

let ergebnisMeinerFunktion = checkMyInput('Roland');