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

    $('#add_author_form').validate({
        rules: {
            a_fname: {
                required: true
            },
            a_lname: {
                required: true,
            },
            a_dob: {
                required: true,
            },
            a_gen:{
                required: true
            },
            a_address:{
                required: true,
                maxlength: 300
            },
            a_mobile_no:{
                required: true,
                number: true
            },
            a_desc:{
                required: true,
                maxlength: 300
            }
        },
        messages: {
            a_fname: {
                required: 'Please Enter Authors First Name',
            },
            a_lname: {
                required: 'Please Enter Authors last Name',
            },
            a_dob: {
                required: 'Please Select Authors Date of Birth',
            },
            a_gen:{
                required: 'Please Select Gender of Author'
            },
            a_address:{
                required: 'Please Enter Address of Author',
                maxlength: 'Maximum 300 characters allowed'
            },
            a_mobile_no:{
                required: 'Please Enter Mobile no of Author',
                number: 'Mobile no should be in numbers only'
            },
            a_desc:{
                required: 'Please Enter Description about author',
                maxlength: 'Maximum 300 characters allowed'
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    $('#edit_author_form').validate({
        rules: {
            a_fname: {
                required: true
            },
            a_lname: {
                required: true,
            },
            a_dob: {
                required: true,
            },
            a_gen:{
                required: true
            },
            a_address:{
                required: true,
                maxlength: 300
            },
            a_mobile_no:{
                required: true,
                number: true
            },
            a_desc:{
                required: true,
                maxlength: 300
            }
        },
        messages: {
            a_fname: {
                required: 'Please Enter Authors First Name',
            },
            a_lname: {
                required: 'Please Enter Authors last Name',
            },
            a_dob: {
                required: 'Please Select Authors Date of Birth',
            },
            a_gen:{
                required: 'Please Select Gender of Author'
            },
            a_address:{
                required: 'Please Enter Address of Author',
                maxlength: 'Maximum 300 characters allowed'
            },
            a_mobile_no:{
                required: 'Please Enter Mobile no of Author',
                number: 'Mobile no should be in numbers only'
            },
            a_desc:{
                required: 'Please Enter Description about author',
                maxlength: 'Maximum 300 characters allowed'
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#add_book_form').validate({
        rules: {
            b_title: {
                required: true
            },
            b_pages: {
                required: true,
                number: true
            },
            b_lang: {
                required: true
            },
            b_author: {
                required: true
            },
            b_img: {
                required: true
            },
            b_isbn: {
                required: true,
                maxlength: 13
            },
            b_desc: {
                required: true
            },
            b_price:{
                required: true,
                number: true
            },
        },
        messages: {
            b_title: {
                required: 'Please Enter Book Title'
            },
            b_pages: {
                required: 'Please Enter Number of Pages in Book',
                number: 'Pages Should be in numbers only'
            },
            b_lang: {
                required: 'Please Enter Book Language'
            },
            b_author: {
                required: 'Please select Author Name of Book'
            },
            b_img: {
                required: 'Please Select Cover Image of Book'
            },
            b_isbn: {
                required: 'Please Enter ISBN Number of Book',
                maxlength: 'Length of ISBN number should be 13 digit'
            },
            b_desc: {
                required: 'Please Enter Description of Book'
            },
            b_price:{
                required:'Please Enter Book Price',
                number: 'Book Price Should be in number only'
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});

