<!-- Jobs Description -->
<style>
    .modal-dialog {
        width: 400px;
        margin: 30px auto;
    }

    .chat {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        /*font-size: 1em;*/
        letter-spacing: 0.1px;
        color: #32465a;
        text-rendering: optimizeLegibility;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
        -webkit-font-smoothing: antialiased;
    }

    #frame {
        width: 100%;
        height: 92vh;
        background: #E6EAEA;
    }

    @media screen and (max-width: 360px) {
        #frame {
            width: 100%;
            height: 100vh;
        }
    }

    #frame #sidepanel {
        float: left;
        min-width: 280px;
        max-width: 340px;
        width: 40%;
        height: 100%;
        background: #2c3e50;
        color: #f5f5f5;
        overflow: hidden;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel {
            width: 58px;
            min-width: 58px;
        }
    }

    #frame #sidepanel #profile {
        width: 80%;
        margin: 25px auto;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile {
            width: 100%;
            margin: 0 auto;
            padding: 5px 0 0 0;
            background: #32465a;
        }
    }

    #frame #sidepanel #profile.expanded .wrap {
        height: 210px;
        line-height: initial;
    }

    #frame #sidepanel #profile.expanded .wrap p {
        margin-top: 20px;
    }

    #frame #sidepanel #profile .wrap {
        height: 60px;
        line-height: 60px;
        overflow: hidden;
        -moz-transition: 0.3s height ease;
        -o-transition: 0.3s height ease;
        -webkit-transition: 0.3s height ease;
        transition: 0.3s height ease;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap {
            height: 55px;
        }
    }

    #frame #sidepanel #profile .wrap img {
        width: 50px;
        border-radius: 50%;
        padding: 3px;
        border: 2px solid #e74c3c;
        height: 50px;
        float: left;
        cursor: pointer;
        -moz-transition: 0.3s border ease;
        -o-transition: 0.3s border ease;
        -webkit-transition: 0.3s border ease;
        transition: 0.3s border ease;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap img {
            width: 40px;
            margin-left: 4px;
        }
    }

    #frame #sidepanel #profile .wrap img.online {
        border: 2px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap img.away {
        border: 2px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap img.busy {
        border: 2px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap img.offline {
        border: 2px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap p {
        float: left;
        margin-left: 15px;
        margin-top: -5px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap p {
            display: none;
        }
    }

    #frame #sidepanel #profile .wrap #expanded {
        padding: 100px 0 0 0;
        display: block;
        line-height: initial !important;
    }

    #frame #sidepanel #profile .wrap #expanded label {
        float: left;
        clear: both;
        margin: 0 8px 5px 0;
        padding: 5px 0;
    }

    #frame #sidepanel #profile .wrap #expanded input {
        border: none;
        margin-bottom: 6px;
        background: #32465a;
        border-radius: 3px;
        color: #f5f5f5;
        padding: 7px;
        width: calc(100% - 43px);
    }

    #frame #sidepanel #profile .wrap #expanded input:focus {
        outline: none;
        background: #435f7a;
    }

    #frame #sidepanel #search {
        border-top: 1px solid #32465a;
        border-bottom: 1px solid #32465a;
        font-weight: 300;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #search {
            display: none;
        }
    }

    #frame #sidepanel #search label {
        position: absolute;
        margin: 10px 0 0 20px;
    }

    #frame #sidepanel #search input {
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        padding: 10px 0 10px 46px;
        width: calc(100% - 25px);
        border: none;
        background: #32465a;
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:focus {
        outline: none;
        background: #435f7a;
    }

    #frame #sidepanel #search input::-webkit-input-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input::-moz-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:-ms-input-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #search input:-moz-placeholder {
        color: #f5f5f5;
    }

    #frame #sidepanel #contacts {
        height: calc(100% - 177px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts {
            height: calc(100% - 149px);
            overflow-y: scroll;
            overflow-x: hidden;
        }

        #frame #sidepanel #contacts::-webkit-scrollbar {
            display: none;
        }
    }

    #frame #sidepanel #contacts.expanded {
        height: calc(100% - 334px);
    }

    #frame #sidepanel #contacts::-webkit-scrollbar {
        width: 8px;
        background: #2c3e50;
    }

    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
        background-color: #243140;
    }

    #frame #sidepanel #contacts ul li.contact {
        position: relative;
        padding: 10px 0 15px 0;
        font-size: 0.9em;
        cursor: pointer;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact {
            padding: 6px 0 46px 8px;
        }
    }

    #frame #sidepanel #contacts ul li.contact:hover {
        background: #32465a;
    }

    #frame #sidepanel #contacts ul li.contact.active {
        background: #32465a;
        border-right: 5px solid #435f7a;
    }

    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
        border: 2px solid #32465a !important;
    }

    #frame #sidepanel #contacts ul li.contact .wrap {
        width: 88%;
        margin: 0 auto;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 100%;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap span {
        position: absolute;
        left: 0;
        margin: -2px 0 0 -2px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #2c3e50;
        background: #95a5a6;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.online {
        background: #2ecc71;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.away {
        background: #f1c40f;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
        background: #e74c3c;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.unread {
        background: red;
        position: relative;
        left: 5px;
        padding: 5px 5px 5px 5px;
    }

    #frame #sidepanel #contacts ul li.contact .wrap img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap img {
            margin-right: 0px;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta {
        padding: 15px 0 0 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            display: none;
        }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
        font-weight: 600;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
        margin: 5px 0 0 0;
        padding: 0 0 1px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        -moz-transition: 1s all ease;
        -o-transition: 1s all ease;
        -webkit-transition: 1s all ease;
        transition: 1s all ease;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
        position: initial;
        border-radius: initial;
        background: none;
        border: none;
        padding: 0 2px 0 0;
        margin: 0 0 0 1px;
        opacity: .5;
    }

    #frame #sidepanel #bottom-bar {
        position: absolute;
        width: 100%;
        bottom: 0;
    }

    #frame #sidepanel #bottom-bar button {
        float: left;
        border: none;
        width: 50%;
        padding: 10px 0;
        background: #32465a;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 0.85em;
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button {
            float: none;
            width: 100%;
            padding: 15px 0;
        }
    }

    #frame #sidepanel #bottom-bar button:focus {
        outline: none;
    }

    #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: 1px solid #2c3e50;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button:nth-child(1) {
            border-right: none;
            border-bottom: 1px solid #2c3e50;
        }
    }

    #frame #sidepanel #bottom-bar button:hover {
        background: #435f7a;
    }

    #frame #sidepanel #bottom-bar button i {
        margin-right: 3px;
        font-size: 1em;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button i {
            font-size: 1.3em;
        }
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button span {
            display: none;
        }
    }

    #frame .content {
        float: right;
        width: 60%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    @media screen and (max-width: 735px) {
        #frame .content {
            width: calc(100% - 58px);
            min-width: 300px !important;
        }
    }

    @media screen and (min-width: 900px) {
        #frame .content {
            width: calc(100% - 340px);
        }
    }

    #frame .content .contact-profile {
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: #f5f5f5;
    }

    #frame .content .contact-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        float: left;
        margin: 9px 12px 0 9px;
    }

    #frame .content .contact-profile p {
        float: left;
    }

    #frame .content .contact-profile .social-media {
        float: right;
    }

    #frame .content .contact-profile .social-media i {
        margin-left: 14px;
        cursor: pointer;
    }

    #frame .content .contact-profile .social-media i:nth-last-child(1) {
        margin-right: 20px;
    }

    #frame .content .contact-profile .social-media i:hover {
        color: #435f7a;
    }

    #frame .content .messages {
        height: auto;
        min-height: calc(100% - 93px);
        max-height: calc(100% - 93px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
        #frame .content .messages {
            max-height: calc(100% - 105px);
        }
    }

    #frame .content .messages::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }

    #frame .content .messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }

    #frame .content .messages ul li {
        display: inline-block;
        clear: both;
        float: left;
        margin: 15px 15px 5px 15px;
        width: calc(100% - 25px);
        font-size: 0.9em;
    }

    #frame .content .messages ul li:nth-last-child(1) {
        margin-bottom: 20px;
    }

    #frame .content .messages ul li.sent img {
        margin: 6px 8px 0 0;
    }

    #frame .content .messages ul li.sent p {
        background: #435f7a;
        color: #f5f5f5;
    }

    #frame .content .messages ul li.replies img {
        float: right;
        margin: 6px 0 0 8px;
    }

    #frame .content .messages ul li.replies p {
        background: #f5f5f5;
        float: right;
    }

    #frame .content .messages ul li img {
        width: 22px;
        border-radius: 50%;
        float: left;
    }

    #frame .content .messages ul li p {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
    }

    @media screen and (min-width: 735px) {
        #frame .content .messages ul li p {
            max-width: 300px;
        }
    }

    #frame .content .message-input {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 99;
    }

    #frame .content .message-input .wrap {
        position: relative;
    }

    #frame .content .message-input .wrap input {
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        float: left;
        border: none;
        width: calc(100% - 90px);
        padding: 11px 32px 10px 8px;
        font-size: 0.8em;
        color: #32465a;
    }

    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap input {
            padding: 15px 32px 16px 8px;
        }
    }

    #frame .content .message-input .wrap input:focus {
        outline: none;
    }

    #frame .content .message-input .wrap .attachment {
        position: absolute;
        right: 60px;
        z-index: 4;
        margin-top: 10px;
        font-size: 1.1em;
        color: #435f7a;
        opacity: .5;
        cursor: pointer;
    }

    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap .attachment {
            margin-top: 17px;
            right: 65px;
        }
    }

    #frame .content .message-input .wrap .attachment:hover {
        opacity: 1;
    }

    #frame .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #32465a;
        color: #f5f5f5;
    }

    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap button {
            padding: 16px 0;
        }
    }

    #frame .content .message-input .wrap button:hover {
        background: #435f7a;
    }

    #frame .content .message-input .wrap button:focus {
        outline: none;
    }

    ol, ul {
        list-style: none;
    }

    .fa {
        display: inline-block;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font: normal normal normal normal normal normal normal 1 FontAwesome;
    }

    #frame .content .message-input .wrap .attachment {
        position: absolute;
        right: 60px;
        z-index: 4;
        margin-top: 10px;
        font-size: 1.1em;
        color: #435f7a;
        opacity: .5;
        cursor: pointer;
    }

    #frame .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #32465a;
        color: #f5f5f5;
    }

    .isTyping {
        font-size: 12px;
    }

    .badge-notify {
        background: red;
        position: relative;
        top: -20px;
        left: -35px;
    }

    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        line-height: 1;
        vertical-align: baseline;
        white-space: nowrap;
        text-align: center;
        background-color: #999;
        border-radius: 10px;
    }
</style>
<section class="g-my-30">
    <div class="container">
        <ul class="u-list-inline">
            <li class="list-inline-item g-mr-7">
                <a class="mt-4 btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                   href="javascript:history.go(-1);"><i
                            class="fa fa-arrow-left"></i> <?php echo _l('back_text') ?></a>
            </li>
            <li class="list-inline-item g-mr-7">
                <h2 class="h4 g-mb-15"><?php echo $route_detail['origin_city']; ?> <i
                            class="icon-arrow-right-circle"></i> <?php echo $route_detail['dest_city']; ?> : <?php echo date('l d F, Y', strtotime($route_detail['datepickerFrom'])); ?> <?php echo _l('at_text'); ?> <?php echo date('H:i', strtotime($route_detail['depart_time_input'])); ?>
                </h2>
            </li>
        </ul>
        <div class="chat mt-5">
            <div id="frame">
                <div id="sidepanel">
                    <div id="profile">
                        <?php
                        echo '<div class="wrap">';
                        echo '<img id="profile-img" src="' . base_url('assets/uploads/' . userimage_by_id($chat_user['user_id'])) . '" class="online" alt="" />';
                        echo '<p>' . username_by_id($chat_user['user_id']) . '</p>';
                        echo '</div>';
                        ?>
                    </div>
                    <div id="search" class="mb-5">
                        <label for=""><?php echo _l('users_text'); ?></label>
                    </div>
                    <div id="contacts">
                        <?php
                        echo '<ul>';
                        foreach ($contactUsers as $user) {
                            $UnreadMessageCount = getUnreadMessageCount($user['user_id'], $_SESSION['User_LoginId'], $route_id);
                            $status             = 'offline';
                            if ($user['chat_online']) {
                                $status = 'online';
                            }
                            $activeUser = '';
                            if ($user['user_id'] == $currentSession) {
                                $activeUser = "active";
                            }
                            echo '<li id="' . $user['user_id'] . '" class="contact ' . $activeUser . '" data-touserid="' . $user['user_id'] . '" data-tousername="' . username_by_id($user['user_id']) . '" data-route_id="' . $route_id . '">';
                            echo '<div class="wrap">';
                            echo '<span id="status_' . $user['user_id'] . '" class="contact-status ' . $status . '"></span>';
                            echo '<img src="' . base_url('assets/uploads/' . userimage_by_id($user['user_id'])) . '" alt="" />';
                            echo '<div class="meta">';
                            echo '<p class="name">' . username_by_id($user['user_id']) . (($UnreadMessageCount > 0) ? '<span id="unread_' . $user['user_id'] . '" class="unread">' . $UnreadMessageCount . '</span>' : '') . ' (' . (($user_type == 'user') ? 'Driver' : 'User') .')</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        ?>
                    </div>
                </div>
                <div class="content" id="content">
                    <div class="contact-profile" id="userSection">
                        <?php
                        echo '<img src="' . base_url('assets/uploads/' . userimage_by_id($currentSession)) . '" alt="" />';
                        echo '<p>' . ((username_by_id($currentSession) != '') ? username_by_id($currentSession) : _l('no_convo_text')) . '</p>';
                        ?>
                    </div>
                    <div class="messages" id="conversation">
                    </div>
                    <div class="message-input" id="replySection">
                        <div class="message-input" id="replyContainer">
                            <div class="wrap">
                                <input type="text" class="chatMessage"
                                       id="chatMessage<?php echo $currentSession; ?>"
                                       data-route_id=""
                                       placeholder="Write your message..."/>
                                <button class="submit chatButton" data-route_id="" id="chatButton<?php echo $currentSession; ?>"><i
                                            class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Jobs Description -->


<a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
</main>
<script>
    $(document).ready(function () {
        setInterval(function () {
            updateUserList();
            updateUnreadMessageCount();
        }, 60000);

        setInterval(function () {
            updateUserChat();
        }, 5000);

        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");

        $(document).on('click', '.contact', function () {
            $('.contact').removeClass('active');
            $(this).addClass('active');
            var to_user_id = $(this).data('touserid');
            var route_id = $(this).data('route_id');
            showUserChat(to_user_id, route_id);
            $(".chatMessage").attr('id', 'chatMessage' + to_user_id);
            $(".chatMessage").attr('data-route_id', route_id);
            $(".chatButton").attr('id', 'chatButton' + to_user_id);
            $(".chatButton").attr('data-route_id', route_id);
        });

        $(document).on("click", '.submit', function (event) {
            var to_user_id = $(this).attr('id');
            var route_id = $(this).data('route_id');
            to_user_id = to_user_id.replace(/chatButton/g, "");
            sendMessage(to_user_id, route_id);
        });
    });
    function updateUserList() {
        $.ajax({
            url: '<?php echo base_url('chat'); ?>/update_user_list',
            method: "POST",
            dataType: "json",
            data: {user_type: '<?php echo $user_type; ?>', route_id: <?php echo $route_id; ?>},
            success: function (response) {
                var obj = response.profileHTML;
                Object.keys(obj).forEach(function (key) {
                    // update user online/offline status
                    if ($("#" + obj[key].userid).length) {
                        if (obj[key].online == 1 && !$("#status_" + obj[key].userid).hasClass('online')) {
                            $("#status_" + obj[key].userid).addClass('online');
                        } else if (obj[key].online == 0) {
                            $("#status_" + obj[key].userid).removeClass('online');
                        }
                    }
                });
            }
        });
    }
    function sendMessage(to_user_id, route_id) {
        message = $(".message-input input").val();
        $('.message-input input').val('');
        if ($.trim(message) == '' || to_user_id == 0) {
            return false;
        }
        $.ajax({
            url: "<?php echo base_url('chat'); ?>/insert_chat",
            method: "POST",
            data: {to_user_id: to_user_id, chat_message: message, route_id: route_id},
            dataType: "json",
            success: function (response) {
                var resp = $.parseJSON(response);
                $('#conversation').html(resp.conversation);
                $(".messages").animate({scrollTop: $('.messages').height()}, "fast");
            }
        });
    }
    function showUserChat(to_user_id, route_id) {
        $.ajax({
            url: "<?php echo base_url('chat'); ?>/show_chat",
            method: "POST",
            data: {to_user_id: to_user_id, route_id: route_id},
            dataType: "json",
            success: function (response) {
                $('#userSection').html(response.userSection);
                $('#conversation').html(response.conversation);
                $('#unread_' + to_user_id).html('').css('display', 'none');
                $(".messages").animate({scrollTop: $('.messages').height()}, "fast");
            }
        });
    }
    function updateUserChat() {
        $('li.contact.active').each(function () {
            var to_user_id = $(this).attr('data-touserid');
            var route_id = $(this).data('route_id');
            $.ajax({
                url: "<?php echo base_url('chat'); ?>/update_user_chat",
                method: "POST",
                data: {to_user_id: to_user_id, route_id: route_id},
                dataType: "json",
                success: function (response) {
                    $('#conversation').html(response.conversation);
                    $(".messages").animate({scrollTop: $('.messages').height()}, "fast");
                }
            });
        });
    }
    function updateUnreadMessageCount() {
        $('li.contact').each(function () {
            if (!$(this).hasClass('active')) {
                var to_user_id = $(this).attr('data-touserid');
                var route_id = $(this).data('route_id');
                $.ajax({
                    url: "<?php echo base_url('chat'); ?>/update_unread_message",
                    method: "POST",
                    data: {to_user_id: to_user_id, route_id: route_id},
                    dataType: "json",
                    success: function (response) {
                        if (response.count) {
                            if (response.count > 0) {
                                $('#unread_' + to_user_id).css('display', 'block');
                            } else {
                                $('#unread_' + to_user_id).css('display', 'none');
                            }
                            $('#unread_' + to_user_id).html(response.count);
                        }
                    }
                });
            }
        });
    }
</script>