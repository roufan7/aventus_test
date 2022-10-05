<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer>
    </script>

    <title>String check</title>
</head>

<body>
    <div class=" py-5" style="margin: 50px 300px  0px  300px">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>String Check</span>
                </div>
            </div>
            <form action="">
                <div class="card-body">

                    <div class="row ">
                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label for="master_string" class="form-label">Master string</label>
                                <input type="text" class="form-control" name="master_string" id="master_string"
                                    placeholder="Enter Your Master String">
                            </div>

                            <div class="mb-3">
                                <label for="string_1" class="form-label">String 1</label>
                                <input type="text" class="form-control" id="string_1"
                                    placeholder="Enter Your String 1">
                                <div id="string1_text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="string_2" class="form-label">String 2</label>
                                <input type="text" class="form-control" id="string_2"
                                    placeholder="Enter Your String 2">
                                <div id="string2_text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="string_3" class="form-label">String 3</label>
                                <input type="text" class="form-control" id="string_3"
                                    placeholder="Enter Your String 3">
                                <div id="string3_text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="string_4" class="form-label">String 4</label>
                                <input type="text" class="form-control" id="string_4"
                                    placeholder="Enter Your String 4">
                                <div id="string4_text"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="button" id="check_btn">Check</button>
                    <button class="btn btn-success" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#check_btn').on('click', function() {
                if ($('#master_string').val() == '' || $('#string_1').val() == '' || $('#string_2')
                    .val() == '' || $('#string_3').val() == '' || $('#string_4').val() == '') {
                    alert("Please Fill all fields")
                    return
                }
                $.ajax({
                    method: "post",
                    url: "{{ route('checkString') }}",
                    data: {
                        master_string: $('#master_string').val(),
                        string_1: $('#string_1').val(),
                        string_2: $('#string_2').val(),
                        string_3: $('#string_3').val(),
                        string_4: $('#string_4').val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        var response = data.data;
                        let string1 = document.getElementById("string1_text")
                        let string2 = document.getElementById("string2_text")
                        let string3 = document.getElementById("string3_text")
                        let string4 = document.getElementById("string4_text")
                        console.log(response)
                        if (response[0] == true) {
                            string1.innerHTML = 'Yes';
                        } else {
                            string1.innerHTML = 'No';
                        }
                        if (response[1] == true) {
                            string2.innerHTML = 'Yes';
                        } else {
                            string2.innerHTML = 'No';
                        }
                        if (response[2] == true) {
                            string3.innerHTML = 'Yes';
                        } else {
                            string3.innerHTML = 'No';
                        }
                        if (response[3] == true) {
                            string4.innerHTML = 'Yes';
                        } else {
                            string4.innerHTML = 'No';
                        }


                    }
                })
            })
        });
    </script>
</body>

</html>
