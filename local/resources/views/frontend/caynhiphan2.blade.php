@extends('frontend.index')
@section('title')
    Trang cá nhân
@endsection
@section('style')
    <style>
        .f12 {
            font-size: 12px;
        }

        .genealogy-scroll::-webkit-scrollbar {
            width: 5px;
            height: 8px;
        }

        .genealogy-scroll::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #e4e4e4;
        }

        .genealogy-scroll::-webkit-scrollbar-thumb {
            background: #212121;
            border-radius: 10px;
            transition: 0.5s;
        }

        .genealogy-scroll::-webkit-scrollbar-thumb:hover {
            background: #d5b14c;
            transition: 0.5s;
        }


        /*----------------genealogy-tree----------*/
        .genealogy-body {
            white-space: nowrap;
            overflow-y: hidden;
            padding: 50px;
            min-height: 500px;
            padding-top: 10px;
            text-align: center;
        }

        .genealogy-tree {
            display: inline-block;
        }

        .genealogy-tree ul {
            padding-top: 20px;
            position: relative;
            padding-left: 0px;
            display: flex;
            justify-content: center;
        }

        .genealogy-tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
        }

        .genealogy-tree li::before, .genealogy-tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #ccc;
            width: 50%;
            height: 18px;
        }

        .genealogy-tree li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #ccc;
        }

        .genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
            display: none;
        }

        .genealogy-tree li:only-child {
            padding-top: 0;
        }

        .genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after {
            border: 0 none;
        }

        .genealogy-tree li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .genealogy-tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        .genealogy-tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #ccc;
            width: 0;
            height: 20px;
        }

        .genealogy-tree li a {
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }

        .genealogy-tree li a:hover + ul li::after,
        .genealogy-tree li a:hover + ul li::before,
        .genealogy-tree li a:hover + ul::before,
        .genealogy-tree li a:hover + ul ul::before {
            border-color: #fbba00;
        }

        /*--------------memeber-card-design----------*/
        .member-view-box {
            padding: 0px 20px;
            text-align: center;
            border-radius: 4px;
            position: relative;
        }

        .member-image {
            width: 60px;
            position: relative;
        }

        .member-image img {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            background-color: #000;
            z-index: 1;
        }


    </style>
@endsection('style')
@section('content')
    @include('errors.dequyUsercon')
    <!-- detail product -->
    <div class="navbar-vina">
        <div class="container">
            <a href="{{url('/')}}">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home"
                     role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z">
                    </path>
                </svg>
                Trang chủ
            </a>
            <a href="{{url('usermanager')}}">Trang quản lý User</a>
        </div>
    </div>
    <div class="subpage">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 right p-1">
                    <div class="box_subpage">
                        <p style="border-bottom: 1px solid #ddd; margin-bottom: 20px;" class="text-left">Xin chào {{Auth::user()->name}}</p>
                        <!--begin contact_page-->
                        <div class="contact_page">
                            <div class="row">
                                <div class="body genealogy-body genealogy-scroll">
                                    <div class="genealogy-tree">
                                        <?php
                                        dequyUser($userCon);
                                        ?>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                            <div class="member-details">
                                                                <h3>John Doe</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="active">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>Member 1</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end contact_page-->
                    </div>
                </div>


            </div>
        </div>
    </div>

    <style>
        .contact_page form input[type=email], .contact_page form textarea {
            width: 100%;
            border: 1px solid #ddd;
            text-indent: 8px;
            height: 32px;
            outline: none;

        }

        .displayNone {
            display: none;
        }
    </style>

    <!-- end detail product -->
@endsection('content')
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#update_user').on('submit', function (event) {
                event.preventDefault();
                let url = $('#url').val();
                $.ajax({
                    url: url,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        if (data.status == true) {
                            location.reload();
                        } else {
                            $('.error3').text(data.message);
                        }
                    },
                    error: function (response) {
                        var dataErr = JSON.parse(response.responseText);
                        var dataErr_arr = dataErr.errors
                        console.log(dataErr_arr);
                        $.each(dataErr_arr, function (ind, val) {
                            if (ind == 'avata') {
                                $('.avata').text(val);
                            }
                            if (ind == 'bankName') {
                                $('.bankName').text(val);
                            }
                            if (ind == 'cccd_matsau') {
                                $('.cccd_matsau').text(val);
                            }
                            if (ind == 'cccd_mattruoc') {
                                $('.cccd_mattruoc').text(val);
                            }
                            if (ind == 'cccd_mattruoc') {
                                $('.cccd_mattruoc').text(val);
                            }
                            if (ind == 'stk') {
                                $('.stk').text(val);
                            }
                        })
                    }
                })
            });
        });
    </script>
    <script>
        $(function () {
            $('.genealogy-tree ul').hide();
            $('.genealogy-tree>ul').show();
            $('.genealogy-tree ul.active').show();
            $('.genealogy-tree li').on('click', function (e) {
                var children = $(this).find('> ul');
                if (children.is(":visible")) children.hide('fast').removeClass('active');
                else children.show('fast').addClass('active');
                e.stopPropagation();
            });
        });

    </script>
@endsection
