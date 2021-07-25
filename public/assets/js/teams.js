import { drawTable } from './table-teams.js';
import { getTeams, storeTeam, currentPage, lastPage } from './endpoints-team.js';

let search = document.getElementById('search');

let previous = document.getElementById('previous');

let next = document.getElementById('next');

let saveTeam = document.getElementById('saveTeam');

let showInfo = document.getElementById('showInfo');

let show = false;

previous.onclick = async e => {

    next.classList.remove('disabled');

    if(currentPage == 2) {
        previous.classList.add('disabled');
    }

    if(currentPage == 1) {
        currentPage = 2;
    }

    const teams = await getTeams(search.value, currentPage - 1);

    const {data} = teams.data;

    drawTable(data);
};

next.onclick = async e => {

    if(currentPage<lastPage) {

        previous.classList.remove('disabled');
        const teams = await getTeams(search.value, currentPage + 1);
        const {data} = teams.data;
        drawTable(data);

    }

    if(currentPage==lastPage) {
        next.classList.add('disabled');
    }

};

search.onkeyup = async function(){

    previous.classList.add('disabled');

    const teams = await getTeams(search.value);

    const { data } = teams.data;

    drawTable(data);

};

saveTeam.onclick = function() {

    let form = document.forms['form-teams'];

    storeTeam(form);

}

showInfo.onclick = function(e) {
    let infoTeam = document.getElementById('infoTeam');
    show = !show;

    if(show) {
        e.target.textContent = 'Cancelar'
        infoTeam.style.display='block'
        showInfo.classList.remove('btn-primary')
        showInfo.classList.add('btn-danger')
    } else {
        e.target.textContent = 'Agregar Equipo'
        infoTeam.style.display='none'
        showInfo.classList.remove('btn-danger')
        showInfo.classList.add('btn-primary')

    }

}

window.addEventListener('load', async function (){

    previous.classList.add('disabled');

    const teams = await getTeams();

    const {data} = teams.data;

    drawTable(data);

});

