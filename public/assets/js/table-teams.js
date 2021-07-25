import templateTeams from './template-teams.js'
import { deleteTeam } from './endpoints-team.js';
let teamsBody = document.getElementById('teams');


export function drawTable(data) {

    teamsBody.innerHTML = '';

    data.map( team => {

        teamsBody.insertAdjacentHTML('beforeend', templateTeams(team));
        document.getElementById('destroy-'+team.id).onclick = () => {
            deleteTeam(team.id)
        };

    });

}
