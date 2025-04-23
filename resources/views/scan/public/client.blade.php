<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VR Showroom @yield('title')</title>
    <base href="{{ asset('') }}">

    {{-- <meta property="og:url" content="@yield('meta-url')" /> --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('meta-title')" />
    <meta property="og:site_name" content="VNi" />
    <meta property="og:image"
        content="https://my.matterport.com/api/v1/player/models/@yield('model-code-head')/thumb" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="icon" href="client/assets/vni/faicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

{{-- <!-- Messenger Chat Plugin Code -->  <script> var chatbox = document.getElementById('fb-customer-chat'); chatbox.setAttribute("page_id", "PAGE-ID"); chatbox.setAttribute("attribution", "biz_inbox"); </script> <script> window.fbAsyncInit = function() { FB.init({ xfbml : true, version : 'API-VERSION' }); }; (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk')); </script> --}}

    <link rel="stylesheet" href="assets/css/loading.css">
    <link rel="stylesheet" href="client/assets/css/main-style.css" />
    <link rel="stylesheet" href="client/assets/css/matterport.css" />
    <link rel="stylesheet" href="client/assets/css/responsive.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="slidebar">
        <div class="menu_slidebar">
            <div class="header_slidebar">
                <div class="title_slidebar">
                    <h5>Menu</h5>
                </div>
                <div class="close_slidebar">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="content_slidebar">
                <ul class="list_slidebar" id="list_slidebar">

                </ul>
            </div>

            <div class="contactButton"><i class="fas fa-mobile" aria-hidden="true"></i> Contact</div>
            <div class="contact">
                <h5 >Designed &amp; Developed By
                    <a rel="noreferrer" target="_blank" href="">
                        <img src="client/assets/images/logo_bottom.png" class="w-100 logo_sliddebar"  alt="">
                    </a>
                </h5>
            </div>
        </div>
    </div>
    <div class="icon_show_slidebar">
        <i class="fa-solid fa-bars"></i>
    </div>
    {{-- <div class="icon_chat" id="fb-customer-chat">
        <i class="fa-solid fa-comment"></i>

    </div> --}}
    @if($project->category_scan != null && $project->category_scan->logo_pc != null)
    <div id="gui-loading" style="background-color: rgb(255, 255, 255);" class="message-outer">
        <!--<h2 class="model-title"></h2>-->
        <div class="message-inner">
            <img id="gui-loading-splash" src="" style="height: 80px; width: auto; display: none;">
            <div id="circleLoader" style="opacity: 1;">
                <div class="progress-bar g stripes">
                    <span id="loadingProgress" style=" background-color: rgb(75, 205, 252);"></span>
                </div>
                <!-- <div>
                    <h2 id="progressNum" style="color: #dfe0e1;">0%</h2>
                </div> -->
            </div>
            <div id="loaderCoBrand" style="display: none;">
                <div class="vert-align">
                    <h2 id="loaderCoBrandName"></h2>
                </div>
            </div>
            <div class="specialPower" style="display: none"><span class="powered-by">powered by</span>&nbsp;
            </div>
            <div class="message-technology"></div>
            <div class="loadingLogo pc" style="display: none;">
                <img src="" alt="">
            </div>
            <div id="intoModel" style="display: none"></div>
        </div>
    </div>
    <div id="gui-thumb" style=""></div>
    @endif

    <div class="form_contact">
        <div class="form_contact_inner">
            <div class="close_contact">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="contact_inner">
                <h5>Lien He </h5>
                <div class="list_contact">
                    <div class="d-flex">
                        <div class="item_contact contact_left w-50 ">
                            <label class="title_contact" for="">Name:</label>
                            <input type="text" class="input_contact">
                        </div>
                        <div class="item_contact conatct_right w-50 pr-2">
                            <label class="title_contact" for="">Email:</label>
                            <input type="text" class="input_contact">
                        </div>
                    </div>

                    <div class="item_contact  w-100 pr-2">
                        <label class="title_contact" for="">Email:</label>
                        <input type="text" class="input_contact">
                    </div>
                    <div class="item_contact  w-100 pr-2">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>
                    <div class="submit">
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <main>
        <section class="content">
            <iframe src="https://my.matterport.com/show/?m=@yield('model-code-body')&play=1&qs=1"
                frameborder="0" id="showcase-iframe" ></iframe>

            @if($project->category_scan != null && $project->category_scan->logo_pc == null)
            <div class="content__img">
                <img src="client/assets/images/logo_bottom.png" class="w-100" alt="">
            </div>
            @endif
        </section>
    </main>


    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script src="client/assets/js/main-js.js"></script>
    <script src='https://static.matterport.com/showcase-sdk/latest.js'></script>
    <script>
        var mpSdk = null;
        var check_connect = false;
        var open_camera = false;
        (async function connectSdk() {
          const sdkKey = '1t3cpx0wf2wb6nfush0fktamd'; // TODO: replace with your sdk key
          const iframe = document.getElementById('showcase-iframe');
          // connect the sdk; log an error and stop if there were any connection issues
          try {
            const mpSdkdata = await window.MP_SDK.connect(
              iframe,
              sdkKey,
              ''
            );
            onShowcaseConnect(mpSdkdata);
            mpSdkdata.Settings.get('labels')
            .then(function(data) {
                // Setting retrieval complete.
                console.log('Labels setting: ' + data);
                check_connect = true;
                mpSdk = mpSdkdata;
            })
            .catch(function(error) {
                // Setting  retrieval error.
            });
          } catch (e) {
            console.error(e);
          }
        })();
        async function onShowcaseConnect(mpSdk) {
          try {
            const modelData = await mpSdk.Model.getData();
            // console.log('Model sid:' + modelData.sid);
            mpSdk.Camera.pose.subscribe(function (pose) {

            });

            mpSdk.Mattertag.getData()
			.then(function(mattertags) {

				if(mattertags.length > 0) {

					var clicktags = 'Mattertags: ';
					$.each(mattertags, function(key,mattertag) {
						 clicktags +=  mattertag.sid + " - ";
					});

					return mattertags;
				}
				else {

					return false;
				}
			})
			.catch(function(error) {

				return false;
			});
            // add menu
            mpSdk.Mattertag.data.subscribe({
            onAdded: function (index, item, collection) {
                console.log('item1:',item);

                document.getElementById('list_slidebar').innerHTML +=`
                <li class="item_slidebar">
                        <a class="link_slidebar loadPoint" id="${index}" onclick="MoveToPoint('${index}')" >${item.label}</a>
                </li>`;
            },
            onRemoved: function (index, item, collection) {
                console.log('Mattertag removed from the collection', index, item, collection);
            },
            onUpdated: function (index, item, collection) {
                console.log('Mattertag updated in place in the collection', index, item, collection);
            }
            });
          } catch (e) {
            console.error(e);
          }
        }

        function showHideTakePicture(){
            open_camera = !open_camera;
            console.log(open_camera);
            if(open_camera == true){
                $(".show_action_camera").show();
            }else{
                $(".show_action_camera").hide();
            }
        }
        function MoveToPoint(id){
            console.log(id);
            if(check_connect == true){

                const sweepId = id;
                const rotation = { x: 30, y: -45 };
                const transition = mpSdk.Sweep.Transition.INSTANT;
                const transitionTime = 2000; 
                mpSdk.Mattertag.navigateToTag(sweepId)
            }
        }
        function take2d(width,height){
            console.log("take photo" +check_connect);
            if(check_connect == true){

                var propHeight = height;
                // width / height = 640 / X
                var dimensions = { width: width, height: propHeight };
                var options = { mattertags: false, sweeps: true};
                mpSdk.Camera.takeScreenShot( dimensions, options)
                    .then(function (screenShotUrl) {
                        var d = new Date();
                        var id = d.getTime();
                        console.log('mpSdk.Camera.takeScreenShot( {width: ' + width+ ', height: ' + propHeight + '},{mattertags: false, sweeps: true})', '<img id="i' + id + '" />');
                        $('#i'+id).attr('src',screenShotUrl);
                        console.log($('#i' +id))
                        console.log(screenShotUrl);
                        var image_decode = convertBase64toImage(screenShotUrl);
                    })
                    .catch(function(error) {
                        console.log('mpSdk.Camera.takeScreenShot( {width: 640, height: ' + propHeight + '},{mattertags: false, sweeps: true})', 'Error: ' + error);
                        console.log("take error");
                        return false;
                    });
            }
        }
        function takeImage360(){
            console.log("take photo" +check_connect);
            if(check_connect == true){
                var dimensions = { width: 8000, height: 4000 };
                var options = { mattertags: false, sweeps: true};
                mpSdk.Renderer.takeEquirectangular(dimensions,options)
                    .then(function (screenShotUrl) {
                        var d = new Date();
                        var id = d.getTime();
                        console.log('mpSdk.Renderer.takeEquirectangular( {width: 4096, height: 2048},{mattertags: false, sweeps: true})', '<img id="i' + id + '" />');
                        console.log(screenShotUrl);
                        var image_decode = convertBase64toImage(screenShotUrl);
                    })
                    .catch(function(error) { // Undocumented -- is error logging avialable?
                        console.log('mpSdk.Renderer.takeEquirectangular( {width: 4096, height: 2048},{mattertags: false, sweeps: true})', 'Error: ' + error);
                        return false;
                    });
            }
        }
        function convertBase64toImage(url_image){
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });
                        // POST to server using $.post or $.ajax
                $.ajax({
                    data: {
                        image: url_image
                    },
                    type: 'POST',
                    url: '/scan/image/base64toImage',
                    error: function(err) {
                        console.log("error",err);
                    },
                    success: function(data) {
                        console.log(data);
                        const downloadLink = document.createElement("a");
                        downloadLink.href = data;
                        downloadLink.download = 'test.png';
                        downloadLink.click();
                        console.log(data);
                    }
                });
        }
    </script>
    <script>
            var percent = $('#loadingProgress').animate({  width:100 + '%'},3000);
            console.log($('#loadingProgress').width());
            $("#progressNum").text($("#loadingProgress").width());
            setTimeout(function() {
                $("#gui-thumb,#gui-loading").fadeOut('slow');
            }, 2800);

    </script>
    <style>
        @if($project->category_scan != null)

            @media screen and (max-width: 800px) {
                #gui-thumb{
                    background-image: url(/{{ $project->category_scan->logo_mb }});
                }
            }
            #gui-thumb{
                background-image: url(/{{ $project->category_scan->logo_pc }});
            }
            @endif
    </style>


</body>

</html>
