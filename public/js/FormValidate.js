$(document).ready(function () {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");
    $('#signup').validate({
        rules: {
            'fname':{
                required:true,
                lettersonly: true,
            },
            'lname':{
                required:true,
                lettersonly: true,
            },
            'email':{
                required: true,
                email: true
            },
            'password':{
                required: true,
                minlength: 6
            },
            'cpassword':{
                required:true,
                equalTo: "#password"
            }
        },
        messages: {
            'fname':{
                required:'Please Enter First Name!!',
                lettersonly: 'First Name should be in letters only!!',
            },
            'lname':{
                required:'Please Enter Last Name!!',
                lettersonly: 'Last Name should be in letters only!!',
            },
            'email':{
                required: 'Please Enter Email!!',
                email: 'Please Enter Valid Email!!'
            },
            'password':{
                required: 'Please Enter Password!!',
                minlength: 'Password must be 6 character long!!'
            },
            'cpassword':{
                required:'Please Enter Confirm Password!!',
                equalTo: "Confirm Password must be same as password!!"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    $('#signin').validate({
        rules: {
            'email':{
                required: true,
                email: true
            },
            'password':{
                required: true,
                minlength: 6
            },
        },
        messages: {
            'email': {
                required: 'Please Enter Email!!',
                email: 'Please Enter a valid Email!!',
            },
            'password': {
                required: 'Please Enter Password!!',
                minlength: 'Password must be 6 characters long!!',
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000000)
    }, 'File size must be less than {0} MB');

    $('#account').validate({
        rules: {
            'fname':{
                required:true,
                lettersonly:true,
            },
            'lname':{
                required:true,
                lettersonly:true,
            },
            'image':{
                required:true,
                extension: "jpg|jpeg|png|gif",
                filesize: 3,
            }
        },
        messages: {
            'fname':{
                required:'Please Enter First Name!!',
                lettersonly: 'First Name Must be in letters only!!'
            },
            'lname':{
                required:'Please Enter Name!!',
                lettersonly: 'Last Name Must be in letters only!!'
            },
            'image':{
                required:'Please Choose Image!!',
                extension: 'Only image type jpg/png/jpeg/gif is allowed!!',
                filesize: 'File Size Must be less than 3MB'
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

