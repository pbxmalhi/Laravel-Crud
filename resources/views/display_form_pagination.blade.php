<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .pagination{
            list-style: none;
            margin_top: 50px;
        }
        .pagination li{
            display: inline;
            padding: 10px;
            border: solid 1px #000;
        }
    </style>
    <title>Laravel Crud</title>
</head>

<body>
    <div>
        @if($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                {{$error}}                    
                @endforeach
            </div>
        @endif
    </div>
    <form action="{{url(isset($edata)? 'edit-form-submit/'.$edata[0]->id : 'form-submit')}}" method="post">
        {{csrf_field()}}
        <table>
                <td>Name : </td>
                <td><input type="text" name="name" value="{{isset($edata[0]->name) ? $edata[0]->name : ''}}"></td>
            </tr>
            <tr>
                <td>Marks1 : </td>
                <td><input type="text" name="marks1" value="{{isset($edata[0]->marks1) ? $edata[0]->marks1 : ''}}"></td>
            </tr>
            <tr>
                <td>Marks2 : </td>
                <td><input type="text" name="marks2" value="{{isset($edata[0]->marks2) ? $edata[0]->marks2 : ''}}"></td>
            </tr>
            <tr>
                <td>Marks3 : </td>
                <td><input type="text" name="marks3" value="{{isset($edata[0]->marks3) ? $edata[0]->marks3 : ''}}"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="{{isset($edata)? 'Update' : 'Submit'}}" name="save"></td>
            </tr>
        </table>
    </form>
        <br>
        <hr>
        <br>
        <form action="{{url('search-form-submit')}}" method="post">
            {{csrf_field()}}
            <table>
                <tr>
                    <td>Search : </td>
                    <td><input type="text" name="name"></td>
                    <td><input type="submit" value="Search" name="search"></td>
                </tr>
            </table>
        </form>
        <br>
        <hr>
        <br>
    <table width=80% border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Marks1</th>
                <th>Marks2</th>
                <th>Marks3</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->marks1}}</td>
                    <td>{{$row->marks2}}</td>
                    <td>{{$row->marks3}}</td>
                    <td><a href="{{'delete_data/'.$row->id}}">Delete</a></td>
                    <td><a href="{{'/firstproject/public/display_pagi/'.$row->id}}">Edit</a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7">{{$data->links('pagi')}}</td>
            </tr>
    </table>
</body>

</html>