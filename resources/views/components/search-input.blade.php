@props(['disabled' => false])

<div class="input-group input-group-lg">
    <div class="input-group-prepend">
        <button class="btn btn-info tw-rounded-l-lg"
                type="button"
                id="button-addon2">
        <span class="svg-icon svg-icon-primary text-primary">
         <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.6781 12.9272C15.8884 11.2756 16.4305 9.22795 16.1959 7.19385C15.9613 5.15975 14.9673 3.28923 13.4128 1.95652C11.8583 0.623812 9.85794 -0.0728086 7.81187 0.00602988C5.76581 0.0848684 3.82496 0.933352 2.37762 2.38173C0.930277 3.83011 0.0831823 5.77156 0.00580795 7.81768C-0.0715664 9.8638 0.626485 11.8637 1.96031 13.4172C3.29413 14.9708 5.16536 15.9634 7.19963 16.1966C9.23389 16.4297 11.2812 15.8861 12.9319 14.6746H12.9306C12.9681 14.7246 13.0081 14.7721 13.0531 14.8184L17.8654 19.6307C18.0998 19.8652 18.4178 19.9971 18.7493 19.9972C19.0809 19.9973 19.399 19.8657 19.6335 19.6313C19.8681 19.3969 19.9999 19.079 20 18.7474C20.0001 18.4158 19.8685 18.0978 19.6341 17.8633L14.8218 13.0509C14.7771 13.0057 14.7291 12.9639 14.6781 12.926V12.9272ZM15.0006 8.12238C15.0006 9.02518 14.8227 9.91915 14.4773 10.7532C14.1318 11.5873 13.6254 12.3452 12.987 12.9836C12.3486 13.6219 11.5907 14.1283 10.7567 14.4738C9.92258 14.8193 9.02862 14.9971 8.12582 14.9971C7.22301 14.9971 6.32905 14.8193 5.49497 14.4738C4.66089 14.1283 3.90302 13.6219 3.26464 12.9836C2.62626 12.3452 2.11987 11.5873 1.77438 10.7532C1.4289 9.91915 1.25108 9.02518 1.25108 8.12238C1.25108 6.29909 1.97538 4.55047 3.26464 3.2612C4.55391 1.97194 6.30252 1.24764 8.12582 1.24764C9.94911 1.24764 11.6977 1.97194 12.987 3.2612C14.2763 4.55047 15.0006 6.29909 15.0006 8.12238Z"
      fill="#F5841F"/>
</svg>

        </span>

        </button>
    </div>
    <input type="search"
           {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control font-weight-bolder tw-rounded-lg-r']) !!}
           placeholder="{{ __('app.Looking for') }} ..">

</div>
