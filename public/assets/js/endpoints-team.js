import { drawTable } from './table-teams.js';

export let currentPage = 0;

export let lastPage = 0;

export function deleteTeam(id) {

    fetch(`/api/teams/${id}`, {
        method: 'DELETE',
    })
    .then(res => res.json())
    .then(response => {
        alert(`Equipo ${response.name} eliminado`)

        getTeams().then(teams => {
            const { data } = teams.data;

            drawTable(data);

        });

    }).catch(error => console.log(error));
}

export const getTeams = async (search = '', page = 1) => {

    let teams = await fetch(`/api/teams?page=${page}&name=${search}`);
    let data = await teams.json();
    currentPage = data.data.current_page;
    lastPage = data.data.last_page;
    return data;

}

export function storeTeam(form) {

    let name = form['name'].value;
    let description = form['description'].value;
    let price = form['price'].value;

    let object = {
        name : name,
        description : description,
        price : price
    }

    fetch('/api/teams', {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify(object)
    }).then(response => {

        if(response.ok) {

            alert('Equipo agregado');

        }

        return response

    })
    .then(res => {

        previous.classList.add('disabled');

        if(res.status == 400) {

            res.json().then(json => {

                console.log(json)

            })

        } else {

            res.json().then(json => {

                getTeams(json.data.name).then(teams => {

                    const {data} = teams.data;

                    drawTable(data);

                });
            })
        }

        form.reset();

    })
    .catch(error => console.log(error))

}
