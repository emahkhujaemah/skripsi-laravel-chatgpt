<h1 class="display-4">Data Convolution Neural Network</h1>
<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Text</th>
            <th scope="col">Category</th>
            <th scope="col">Confidence</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->text }}</td>
                <td>{{ $item->sentiment }}</td>
                <td>{{ $item->confidence }}</td>
            </tr>
        @endforeach
    </tbody>
</table>