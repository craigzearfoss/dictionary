<strong>Definite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th>case</th>
        <th>masculine</th>
        <th>feminine</th>
        <th>neuter</th>
        <th>plural</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>nominative</td>
        <td>{{ implode(', ', $data['definite'][$keys['nominative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['nominative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['nominative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['nominative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>accusative</td>
        <td>{{ implode(', ', $data['definite'][$keys['accusative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['accusative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['accusative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['accusative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>dative</td>
        <td>{{ implode(', ', $data['definite'][$keys['dative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['dative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['dative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['dative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>genitive</td>
        <td>{{ implode(', ', $data['definite'][$keys['genitive']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['genitive']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['genitive']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['genitive']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    </tbody>
</table>

<strong>Indefinite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <tbody>
    <tr>
        <th>case</th>
        <th>masculine</th>
        <th>feminine</th>
        <th>neuter</th>
        <th>plural</th>
    </tr>
    <tr>
        <td>nominative</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['nominative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['nominative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['nominative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['nominative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>accusative</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['accusative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['accusative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['accusative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['accusative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>dative</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['dative']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['dative']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['dative']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['dative']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    <tr>
        <td>genitive</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['genitive']][$keys['singular']][$keys['masculine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['genitive']][$keys['singular']][$keys['feminine']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['genitive']][$keys['singular']][$keys['neuter']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['genitive']][$keys['plural']][$keys['none']]) }}</td>
    </tr>
    </tbody>
</table>
