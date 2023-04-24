<div class="sa-app__sidebar">
    <div class="sa-sidebar">
      <div class="sa-sidebar__header">
        <a class="sa-sidebar__logo" href="{{url('Dashboard')}}"><!-- logo -->
          <div class="sa-sidebar-logo">
              <img src={{asset("img/avatar/logo.png")}} width="150px" height="60px" >
            <div class="sa-sidebar-logo__caption">{{__('message.Admins')}}</div>
          </div>
          <!-- logo / end --></a
        >
      </div>
      <div class="sa-sidebar__body" data-simplebar="">
        <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
          <li class="sa-nav__section">
            <div class="sa-nav__section-title">
              <span>{{__('message.APPLICATION')}}</span>
            </div>
            <ul class="sa-nav__menu sa-nav__menu--root">
              <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                <a href="{{route('Dashboard')}}" class="sa-nav__link"><span class="sa-nav__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                      <path
                        d="M8,13.1c-4.4,0-8,3.4-8-3C0,5.6,3.6,2,8,2s8,3.6,8,8.1C16,16.5,12.4,13.1,8,13.1zM8,4c-3.3,0-6,2.7-6,6c0,4,2.4,0.9,5,0.2C7,9.9,7.1,9.5,7.4,9.2l3-2.3c0.4-0.3,1-0.2,1.3,0.3c0.3,0.5,0.2,1.1-0.2,1.4l-2.2,1.7c2.5,0.9,4.8,3.6,4.8-0.2C14,6.7,11.3,4,8,4z"
                      ></path></svg></span>
                      <span class="sa-nav__title">{{__('message.Dashboard')}}</span></a>
              </li>
              <li
                class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                data-sa-collapse-item="sa-nav__menu-item--open"
              >
                <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                  ><span class="sa-nav__icon"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      fill="currentColor"
                    >
                      <path
                        d="M8,6C4.7,6,2,4.7,2,3s2.7-3,6-3s6,1.3,6,3S11.3,6,8,6z M2,5L2,5L2,5C2,5,2,5,2,5z M8,8c3.3,0,6-1.3,6-3v3c0,1.7-2.7,3-6,3S2,9.7,2,8V5C2,6.7,4.7,8,8,8z M14,5L14,5C14,5,14,5,14,5L14,5z M2,10L2,10L2,10C2,10,2,10,2,10z M8,13c3.3,0,6-1.3,6-3v3c0,1.7-2.7,3-6,3s-6-1.3-6-3v-3C2,11.7,4.7,13,8,13z M14,10L14,10C14,10,14,10,14,10L14,10z"
                      ></path></svg></span
                  ><span class="sa-nav__title">{{__('message.Mysite')}}</span
                  ><span class="sa-nav__arrow"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="6"
                      height="9"
                      viewBox="0 0 6 9"
                      fill="currentColor"
                    >
                      <path
                        d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                      ></path></svg></span
                ></a>
                <ul
                  class="sa-nav__menu sa-nav__menu--sub"
                  data-sa-collapse-content=""
                >
                  <li class="sa-nav__menu-item">
                    <a href="{{url('Admin/users')}}" class="sa-nav__link">
                    <span class="sa-nav__menu-item-padding"></span>
                    <span class="sa-nav__title">{{__('message.users')}}</span>
                    </a>
                    {{-- @can('Roles') --}}
                </li>
                <li class="sa-nav__menu-item">
                    <a href="{{url('Admin/Notify')}}" class="sa-nav__link"
                    ><span class="sa-nav__menu-item-padding"></span
                        ><span class="sa-nav__title">{{__('message.AllNotification')}}</span></a
                        >
                    </li>
                    {{-- @endcan --}}
                  {{-- <li class="sa-nav__menu-item">
                    <a href="" class="sa-nav__link"
                      ><span class="sa-nav__menu-item-padding"></span
                      ><span class="sa-nav__title">{{__('message.Rooms')}}</span></a
                    >
                  </li> --}}
{{--
                   <li class="sa-nav__menu-item">
                    <a href="{{url('Admin/users/notify')}}" class="sa-nav__link"
                      ><span class="sa-nav__menu-item-padding"></span
                      ><span class="sa-nav__title">{{__('message.Send_Notification')}}</span></a
                    >
                  </li> --}}
                </ul>
              </li>

              {{-- // start of background section --}}
              {{-- <li
                class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                data-sa-collapse-item="sa-nav__menu-item--open">
                <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                  ><span class="sa-nav__icon"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="1em"
                      height="1em"
                      viewBox="0 0 16 16"
                      fill="currentColor"
                    >
                      <path
                        d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                      ></path></svg></span>
                      <span class="sa-nav__title">{{__('message.Backgrounds')}}</span>
                      <span class="sa-nav__arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                      <path
                        d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
                ></a>
                <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                  <li class="sa-nav__menu-item">
                    <a href="" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                        <span class="sa-nav__title">{{__('message.Backgrounds_list')}}</span>
                    </a>
                  </li>
                  <li class="sa-nav__menu-item">
                    <a href="" class="sa-nav__link"
                      ><span class="sa-nav__menu-item-padding"></span
                      ><span class="sa-nav__title">{{__('message.Backgrounds_create')}}</span></a
                    >
                  </li>
                </ul>
              </li> --}}
                {{-- // end of background section --}}


             {{-- // start of badges section --}}
             {{-- <li
             class="sa-nav__menu-item sa-nav__menu-item--has-icon"
             data-sa-collapse-item="sa-nav__menu-item--open">
             <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
               ><span class="sa-nav__icon"
                 ><svg
                   xmlns="http://www.w3.org/2000/svg"
                   width="1em"
                   height="1em"
                   viewBox="0 0 16 16"
                   fill="currentColor"
                 >
                   <path
                     d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                   <span class="sa-nav__title">{{__('message.Badges')}}</span>
                   <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                     d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
             ></a>
             <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
               <li class="sa-nav__menu-item">
                 <a href="" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                     <span class="sa-nav__title">{{__('message.Badge_list')}}</span>
                 </a>
               </li>
               <li class="sa-nav__menu-item">
                 <a href="" class="sa-nav__link">
                <span class="sa-nav__menu-item-padding"></span>
                <span class="sa-nav__title">{{__('message.Badge_create')}}</span>
                </a>
               </li>
             </ul>
           </li> --}}
                         {{-- // end of badge section --}}


                          {{-- // start of Music section --}}
             {{-- <li
             class="sa-nav__menu-item sa-nav__menu-item--has-icon"
             data-sa-collapse-item="sa-nav__menu-item--open">
             <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
               ><span class="sa-nav__icon"
                 ><svg
                   xmlns="http://www.w3.org/2000/svg"
                   width="1em"
                   height="1em"
                   viewBox="0 0 16 16"
                   fill="currentColor"
                 >
                   <path
                     d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                   <span class="sa-nav__title">{{__('message.music')}}</span>
                   <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                     d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
             ></a>
             <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
               <li class="sa-nav__menu-item">
                 <a href="" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                     <span class="sa-nav__title">{{__('message.music_list')}}</span>
                 </a>
               </li>
               <li class="sa-nav__menu-item">
                 <a href="" class="sa-nav__link"
                   ><span class="sa-nav__menu-item-padding"></span
                   ><span class="sa-nav__title">{{__('message.music_create')}}</span></a
                 >
               </li>
             </ul>
           </li> --}}
                         {{-- // end of Music section --}}
                {{-- /// start of section  --}}
                {{-- <li
                    class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                    data-sa-collapse-item="sa-nav__menu-item--open">
                    <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                    ><span class="sa-nav__icon"
                        ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                            >
                   <path
                       d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                        <span class="sa-nav__title">{{__('message.clans')}}</span>
                        <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                       d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
                        ></a>
                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                        <li class="sa-nav__menu-item">
                            <a href="" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                                <span class="sa-nav__title">{{__('message.Clan_List')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                /// end of section --}}
                {{-- /// start of section  --}}
                {{-- <li
                    class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                    data-sa-collapse-item="sa-nav__menu-item--open">
                    <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                    ><span class="sa-nav__icon"
                        ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                            >
                   <path
                       d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                        <span class="sa-nav__title">{{__('message.Rooms')}}</span>
                        <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                       d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
                        ></a>
                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                        <li class="sa-nav__menu-item">
                            <a href="" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                                <span class="sa-nav__title">{{__('message.rooms_List')}}</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- /// end of section --}}
                <li
                    class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                    data-sa-collapse-item="sa-nav__menu-item--open">
                    <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                    ><span class="sa-nav__icon"
                        ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                            >
                   <path
                       d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                        <span class="sa-nav__title">{{__('message.users')}}</span>
                        <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                       d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
                        ></a>
                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                        <li class="sa-nav__menu-item">
                            <a href="{{url('Admin/users')}}" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                                <span class="sa-nav__title">{{__('message.user_List')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- /// end of section --}}

                {{-- /// start of section  --}}
              <li
              class="sa-nav__menu-item sa-nav__menu-item--has-icon"
              data-sa-collapse-item="sa-nav__menu-item--open">
              <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
                ><span class="sa-nav__icon"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                  >
                    <path
                      d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                    ></path></svg></span>
                    <span class="sa-nav__title">{{__('message.Roles')}}</span>
                    <span class="sa-nav__arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                    <path
                      d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
              ></a>
              <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
{{--                @can('role-list')--}}
                <li class="sa-nav__menu-item">
                    <a href="{{url('Admin/Role')}}" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                        <span class="sa-nav__title">{{__('message.Roles_list')}}</span>
                    </a>
                </li>
{{--                  @endcan--}}
                <li class="sa-nav__menu-item">
                  <a href="{{url('Admin/Role/create')}}" class="sa-nav__link">
                    <span class="sa-nav__menu-item-padding"></span>
                    <span class="sa-nav__title">{{__('message.Roles_create')}}</span>
                </a>
                </li>
              </ul>
            </li>
            {{-- /// end of section --}}

             {{-- /// start of section  --}}
             <li
             class="sa-nav__menu-item sa-nav__menu-item--has-icon"
             data-sa-collapse-item="sa-nav__menu-item--open">
             <a href="#" class="sa-nav__link" data-sa-collapse-trigger=""
               ><span class="sa-nav__icon"
                 ><svg
                   xmlns="http://www.w3.org/2000/svg"
                   width="1em"
                   height="1em"
                   viewBox="0 0 16 16"
                   fill="currentColor"
                 >
                   <path
                     d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                   ></path></svg></span>
                   <span class="sa-nav__title">{{__('message.Admins')}}</span>
                   <span class="sa-nav__arrow">
                 <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                   <path
                     d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span
             ></a>
             <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
               <li class="sa-nav__menu-item">
                 <a href="{{url('Admin')}}" class="sa-nav__link"><span class="sa-nav__menu-item-padding"></span>
                     <span class="sa-nav__title">{{__('message.Admins_list')}}</span>
                 </a>
               </li>
               <li class="sa-nav__menu-item">
                 <a href="{{url('Admin/create')}}" class="sa-nav__link">
                   <span class="sa-nav__menu-item-padding"></span>
                   <span class="sa-nav__title">{{__('message.Admins_create')}}</span>
               </a>
               </li>
             </ul>
           </li>
           {{-- /// end of section --}}

{{--              <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">--}}
{{--                <a href="app-chat.html" class="sa-nav__link"--}}
{{--                  ><span class="sa-nav__icon"--}}
{{--                    ><i class="fas fa-comment"></i></span--}}
{{--                  ><span class="sa-nav__title">Chat</span--}}
{{--                  ><span--}}
{{--                    class="sa-nav__menu-item-badge badge badge-sa-pill badge-sa-theme"--}}
{{--                    >8</span--}}
{{--                  ></a--}}
{{--                >--}}
{{--              </li>--}}

            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="sa-app__sidebar-shadow"></div>
    <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
  </div>
