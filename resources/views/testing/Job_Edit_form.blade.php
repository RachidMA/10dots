<h1>Doer Information</h1>

<table border = "1">
    <tr>
        <td>Id</td>
        <td>First name</td>
        <td>last name</td>
        <td>address</td>
        <td>country</td>
        <td>city</td>
        <td>job title</td>
        <td>price range</td>
        <td>image url</td>
        <td>phone</td>
        <td>description</td>
    </tr>
        @foreach ($doers as $doer)
        <tr>
            <td>{{ $doer['id'] }}</td>
            <td>{{ $doer[ 'first_name' ] }}</td>
            <td>{{ $doer[ 'last_name' ] }}</td>
            <td>{{ $doer[ 'address' ] }}</td>
            <td>{{ $doer[ 'country' ] }}</td>
            <td>{{ $doer[ 'city' ] }}</td>
            <td>{{ $doer[ 'job_title' ] }}</td>
            <td>{{ $doer[ 'price_range' ] }}</td>
            <td>{{ $doer[ 'image_url' ] }}</td>
            <td>{{ $doer[ 'phone' ] }}</td>
            <td>{{ $doer[ 'description' ] }}</td>
            <td><a href = "{{  route ('deleteJob', [ 'id'=>$doer->id]) }}">Delete</a></td>
        </tr>
        @endforeach
</table>