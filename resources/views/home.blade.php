@extends('layouts.master')


@section('content')
    <div class = "right_panel member_home value_span7">

        <div class = "white_box_outer">
            <div class = "heading_holder">
                <span class = "lft value_span9">My Account</span>
            </div>
            <div class = "clear"></div>
            <div class = "content_box value_span8">

                <div class = "com_acc">
                    <p><span class = "lft value_span9">Name</span><span class = "rt value_span10">{{$firstName}}</span></p>
                    <p><span class = "lft value_span9">E-mail</span><span class = "rt "><a href = "mailto:{{$email}}">{{$email}}</a></span></p>
                    <p><span class = "lft value_span9">Username</span><span class = "rt ">{{$username}}</span></p>
                    <p><span class = "lft value_span9">Phone No</span><span class = "rt ">{{$phone}}</span></p>
                    <p><span class = "lft value_span9">Skype</span><span class = "rt ">{{$skype}}</span></p>
                    <p><span class = "lft value_span9">Password</span><span class = "rt value_span10"><a href = "{{$webroot . "aff_update.php?idrep=" . $userId}}">Change Password</a></span></p>

                    @if ($canViewPostback)
                        <p><span class = "lft value_span9">PostBack URL:</span>
                        <p>
                            <span id = "pb1" class = "rt blue_txt\">{{$postBackURL}}</span>
                            <button onclick = "copyToClipboard(getElementById('pb1'));" class = 'copy_text value_span6 value_span5'>Click To Copy Link</button>
                        </p>
                    @endif


                    <div class = "com_acc">
                        <a class = "btn value_span6-1 value_span2 value_span11-2" href = "aff_update.php?idrep={{$userId}}">Edit my account</a>
                    </div>
                </div><!-- com_acc -->
            </div><!-- content_box -->
        </div><!-- white_box_outer -->
    </div>
    <!--right_panel-->


@endsection
