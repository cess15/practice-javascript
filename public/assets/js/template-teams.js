export default function printTable(object) {

    return `
        <tr>
            <td>${object.name}</td>
            <td>${object.description}</td>
            <td>${object.price}</td>
            <td><a href="/equipos/editar/${object.id}" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger" id="destroy-${object.id}">Eliminar</a></td>
        </tr>
    `;
}
