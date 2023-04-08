<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
  <!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 14:08:11 GMT -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>@yield("title","index")</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href={{asset("assets/images/favicon.png")}} />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->

    <link rel="stylesheet" href={{asset("assets/vendor/bootstrap/css/bootstrap.ltr.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/highlight.js/styles/github.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/simplebar/simplebar.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/quill/quill.snow.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/air-datepicker/css/datepicker.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/select2/css/select2.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/datatables/css/dataTables.bootstrap5.min.css")}}/>
    <link rel="stylesheet" href={{asset("assets/vendor/nouislider/nouislider.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/fullcalendar/main.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/style.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/Notification.css")}} />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-97489509-8");
    </script>
  </head>
  <body>
    <!-- sa-app -->
    <div
      class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed"
    >
      <!-- sa-app__sidebar -->
      @include("admin.layouts.sidebar")
      <!-- sa-app__sidebar / end --><!-- sa-app__content -->
      <div class="sa-app__content">
        <!-- sa-app__toolbar -->
        @include("admin.layouts.tollbar")
        <!-- sa-app__toolbar / end --><!-- sa-app__body -->
            @yield("content")
        <!-- sa-app__body / end --><!-- sa-app__footer -->
        @include("admin.layouts.footer")
        <!-- sa-app__footer / end -->
      </div>
      <!-- sa-app__content / end --><!-- sa-app__toasts -->
      <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
      <!-- sa-app__toasts / end -->
    </div>
    <!-- sa-app / end --><!-- scripts -->
    <script src={{asset("assets/vendor/jquery/jquery.min.js")}}></script>
    <script src={{asset("assets/vendor/feather-icons/feather.min.js")}}></script>
    <script src={{asset("assets/vendor/simplebar/simplebar.min.js")}}></script>
    <script src={{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("assets/vendor/highlight.js/highlight.pack.js")}}></script>
    <script src={{asset("assets/vendor/quill/quill.min.js")}}></script>
    <script src={{asset("assets/vendor/air-datepicker/js/datepicker.min.js")}}></script>
    <script src={{asset("assets/vendor/air-datepicker/js/i18n/datepicker.en.js")}}></script>
    <script src={{asset("assets/vendor/select2/js/select2.min.js")}}></script>
    <script src={{asset("assets/vendor/fontawesome/js/all.min.js")}} data-auto-replace-svg="" async=""></script>
    <script src={{asset("assets/vendor/chart.js/chart.min.js")}}></script>
    <script src={{asset("assets/vendor/datatables/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("assets/vendor/datatables/js/dataTables.bootstrap5.min.js")}}></script>
    <script src={{asset("assets/vendor/nouislider/nouislider.min.js")}}></script>
    <script src={{asset("assets/vendor/fullcalendar/main.min.js")}}></script>
    <script src={{asset('assets/vendor/bootstrap/js/bootstrap-typehead.js')}}></script>
    <script src={{asset("assets/js/stroyka.js")}}></script>
    <script src={{asset("assets/js/custom.js")}}></script>
    <script src={{asset("assets/js/calendar.js")}}></script>
    <script src={{asset("assets/js/demo.js")}}></script>
    <script src={{asset("assets/js/demo-chart-js.js")}}></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script type="text/javascript">
      var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

    //   if (notificationsCount <= 0) {
    //     notificationsWrapper.hide();
    //   }

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('8545a3beb3c9406a3f2f', {
      cluster: 'eu'
    });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('Notify');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\ApprovedNotify', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = ``;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notifications.show();
        notificationsWrapper.show();
      });
    </script>
  </body>

  @yield('script')
  <!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 14:08:38 GMT -->
</html>
