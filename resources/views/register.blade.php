@extends('layout.app')
@section('content')
    <div class="container">
        <h2>Stacked form</h2>
        <form id="addUser">
            <div class="form-group">
                <label for="fist_name">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="last_name">
            </div>
            <div class="form-group">
                <label for="gedner">Gender</label>
                <input type="radio" name="gender" value="10">Male
                <input type="radio" name="gender" value="20">Female
            </div>

            <div class="form-group">
                <label for="email">Emile</label>
                <input type="email" name="email" class="form-control" >

            </div>
            <div class="form-group">
                <label for="gedner">Password</label>
                <input type="password" name="password" class="form-control" >

            </div>

            {{ csrf_field() }}
            <div class="form-group">
                <label for="phoen">Phone</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <table id="ff">



        </table>
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function () {
           getAll();
            $("#addUser").submit(function () {

                event.preventDefault();
                $.ajax({
                    url:"{{ url('user/add') }}",
                    type:'POST',
                    data:$("#addUser").serialize(),
                    success:function () {
                        //console.log("sucess");
                        getAll();
                    }




                })
            })
        });


    </script>
    <script>
        function getAll() {

            $.ajax({

                url:"{{url('user')}}",
                dataType:'json',
                success:function (data) {
                        var html="";


                        for (var i=0 ;i<data.length;i++)
                    {

                        console.log(i);
                        html +="<tr>";
                        html +="<td>"+ data[i]['first_name'];
                        html +="</td>"

                    }

                   $("#ff").html(html);


                }



            })

        }
    </script>
    @endsection
