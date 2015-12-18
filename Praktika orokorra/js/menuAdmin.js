/**
 * Created by Mikel on 16/12/2015.
 */
function eskaerakKudeatu(){
    document.getElementById('eskaeraKud').style.display='block';
    document.getElementById('argazkiKud').style.display='none';
    document.getElementById('erabKud').style.display='none';

    document.getElementById('esk').style.color='blue';
    document.getElementById('arg').style.color='black';
    document.getElementById('erb').style.color='black';
}

function argazkiakKudeatu(){
    document.getElementById('argazkiKud').style.display='block';
    document.getElementById('erabKud').style.display='none';
    document.getElementById('eskaeraKud').style.display='none';

    document.getElementById('esk').style.color='black';
    document.getElementById('arg').style.color='blue';
    document.getElementById('erb').style.color='black';
}

function erabiltzaileakKudeatu(){
    document.getElementById('erabKud').style.display='block';
    document.getElementById('eskaeraKud').style.display='none';
    document.getElementById('argazkiKud').style.display='none';

    document.getElementById('esk').style.color='black';
    document.getElementById('arg').style.color='black';
    document.getElementById('erb').style.color='blue';
}