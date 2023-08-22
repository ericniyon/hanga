<div>
<style>
    /* Style the buttons that are used to open and close the accordion panel */
.accordion {
  cursor: pointer;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;
}
.down{
    color: #2A337E;
    display: none;
    overflow: hidden;
}
</style>

<div class="row">
    <div class="col-12 h-20px">
        <div wire:loading class="w-100 h-100">
            <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                <div>{{ __('app.Please wait') }} ... &nbsp;</div>
                <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-3 mt-5"
         x-data="{ open: true }">
         <span class="nav-link rounded-0 text-info text-left pl-0 mb-5">
                  <span>
                      <span class="svg-icon mr-3">
                          @include('partials.icons._filter')
                        </span>
                        {{ __('app.Filter By') }}
                  </span>
            </span>
<h4 class="mb-3 d-lg-none d-flex justify-content-between align-items-center">
            <span>
            <span class="svg-icon"> <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.414 0.414062L4 1.82806L5.172 3.00006H1C0.734784 3.00006 0.48043 3.10542 0.292893 3.29296C0.105357 3.48049 0 3.73485 0 4.00006V6.59006C0 7.11306 0.213 7.62706 0.583 7.99706L6 13.4141V21.0001C6.0002 21.1704 6.04387 21.3379 6.1269 21.4867C6.20992 21.6355 6.32955 21.7606 6.47444 21.8502C6.61934 21.9399 6.78471 21.991 6.9549 21.9989C7.1251 22.0067 7.29447 21.971 7.447 21.8951L11.447 19.8951C11.786 19.7251 12 19.3791 12 19.0001V13.4141L13.793 11.6211L16.728 14.5561L18.142 13.1421L5.414 0.414062ZM12.379 10.2071L10.293 12.2931C10.2 12.3858 10.1262 12.496 10.0759 12.6173C10.0256 12.7386 9.99981 12.8687 10 13.0001V18.3821L8 19.3821V13.0001C8.00019 12.8687 7.9744 12.7386 7.92412 12.6173C7.87383 12.496 7.80004 12.3858 7.707 12.2931L2 6.59006V5.00006H7.172L12.379 10.2071V10.2071Z" fill="#2A337E"></path>
                <path d="M17.0001 3H10.8281L12.8281 5H16.0011L16.0031 6.583L15.2071 7.379L16.6211 8.793L17.4171 7.997C17.7871 7.627 18.0001 7.113 18.0001 6.59V4C18.0001 3.73478 17.8948 3.48043 17.7072 3.29289C17.5197 3.10536 17.2653 3 17.0001 3Z" fill="#2A337E"></path>
                </svg>
                </span>
                    Filter By
            </span>
            </h4>

    </div> --}}

    <div class="col-lg-3 mt-5">

                <div class="bg-light-light shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">

                <label for="job_6" class="mb-0 h5">
                <span class="svg-icon">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.625 3.0625H4.375C3.89375 3.0625 3.5 3.45625 3.5 3.9375V6.5625C3.5 7.04375 3.89375 7.4375 4.375 7.4375H16.625C17.1063 7.4375 17.5 7.04375 17.5 6.5625V3.9375C17.5 3.45625 17.1063 3.0625 16.625 3.0625Z" fill="#2A337E"></path>
                <path d="M16.625 8.3125H4.375C3.89375 8.3125 3.5 8.70625 3.5 9.1875V11.8125C3.5 12.2938 3.89375 12.6875 4.375 12.6875H16.625C17.1063 12.6875 17.5 12.2938 17.5 11.8125V9.1875C17.5 8.70625 17.1063 8.3125 16.625 8.3125Z" fill="#2A337E"></path>
                <path d="M16.625 13.5625H4.375C3.89375 13.5625 3.5 13.9562 3.5 14.4375V17.0625C3.5 17.5438 3.89375 17.9375 4.375 17.9375H16.625C17.1063 17.9375 17.5 17.5438 17.5 17.0625V14.4375C17.5 13.9562 17.1063 13.5625 16.625 13.5625Z" fill="#2A337E"></path>
                <path d="M19.7751 16.6687C19.8188 16.4937 19.8188 16.3187 19.8188 16.1875C19.8188 16.0563 19.8188 15.8375 19.7751 15.7063L20.7813 14.9625C20.8688 14.875 20.9126 14.7438 20.8688 14.6562L19.8626 12.95C19.8188 12.8625 19.6876 12.8187 19.5563 12.8625L18.4188 13.3875C18.1563 13.1688 17.8501 12.9937 17.5438 12.8625L17.4126 11.5938C17.4126 11.4625 17.2813 11.375 17.1938 11.375H15.2251C15.0938 11.375 15.0063 11.4625 15.0063 11.5938L14.8751 12.8625C14.5688 12.9937 14.2626 13.1688 14.0001 13.3875L12.8626 12.8625C12.7313 12.8187 12.6001 12.8625 12.5563 12.95L11.5501 14.6562C11.5063 14.7438 11.5063 14.9188 11.6376 14.9625L12.6438 15.7063C12.6001 15.8813 12.6001 16.0563 12.6001 16.1875C12.6001 16.3187 12.6001 16.5375 12.6438 16.6687L11.6376 17.4125C11.5501 17.5 11.5063 17.6312 11.5501 17.7188L12.5563 19.425C12.6001 19.5125 12.7313 19.5562 12.8626 19.5125L14.0001 18.9875C14.2626 19.2063 14.5688 19.3812 14.8751 19.5125L15.0063 20.7812C15.0063 20.9125 15.1376 21 15.2251 21H17.1938C17.3251 21 17.4126 20.9125 17.4126 20.7812L17.5438 19.5125C17.8501 19.3812 18.1563 19.2063 18.4188 18.9875L19.5563 19.5125C19.6876 19.5562 19.8188 19.5125 19.8626 19.425L20.8688 17.7188C20.9126 17.6312 20.9126 17.4562 20.7813 17.4125L19.7751 16.6687ZM16.1876 18.4625C14.9188 18.4625 13.9126 17.4563 13.9126 16.1875C13.9126 14.9188 14.9188 13.9125 16.1876 13.9125C17.4563 13.9125 18.4626 14.9188 18.4626 16.1875C18.4626 17.4563 17.4563 18.4625 16.1876 18.4625Z" fill="#F34D10"></path>
                <path d="M16.1875 13.5625C14.7437 13.5625 13.5625 14.7437 13.5625 16.1875C13.5625 17.6312 14.7437 18.8125 16.1875 18.8125C17.6312 18.8125 18.8125 17.6312 18.8125 16.1875C18.8125 14.7437 17.6312 13.5625 16.1875 13.5625ZM16.1875 17.5C15.4438 17.5 14.875 16.9313 14.875 16.1875C14.875 15.4438 15.4438 14.875 16.1875 14.875C16.9313 14.875 17.5 15.4438 17.5 16.1875C17.5 16.9313 16.9313 17.5 16.1875 17.5Z" fill="#EA8124"></path>
                </svg>


                </span>
                Complants </label>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="6" wire:model="selectedOpportunityTypes" id="job_6">
                    <span class="border-info rounded-sm border-2"></span>
                </label>
            </div>
                    <div class="bg-light-light shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                <label for="job_7" class="mb-0 h5">
                <span class="svg-icon">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.625 3.0625H4.375C3.89375 3.0625 3.5 3.45625 3.5 3.9375V6.5625C3.5 7.04375 3.89375 7.4375 4.375 7.4375H16.625C17.1063 7.4375 17.5 7.04375 17.5 6.5625V3.9375C17.5 3.45625 17.1063 3.0625 16.625 3.0625Z" fill="#2A337E"></path>
                <path d="M16.625 8.3125H4.375C3.89375 8.3125 3.5 8.70625 3.5 9.1875V11.8125C3.5 12.2938 3.89375 12.6875 4.375 12.6875H16.625C17.1063 12.6875 17.5 12.2938 17.5 11.8125V9.1875C17.5 8.70625 17.1063 8.3125 16.625 8.3125Z" fill="#2A337E"></path>
                <path d="M16.625 13.5625H4.375C3.89375 13.5625 3.5 13.9562 3.5 14.4375V17.0625C3.5 17.5438 3.89375 17.9375 4.375 17.9375H16.625C17.1063 17.9375 17.5 17.5438 17.5 17.0625V14.4375C17.5 13.9562 17.1063 13.5625 16.625 13.5625Z" fill="#2A337E"></path>
                <path d="M19.7751 16.6687C19.8188 16.4937 19.8188 16.3187 19.8188 16.1875C19.8188 16.0563 19.8188 15.8375 19.7751 15.7063L20.7813 14.9625C20.8688 14.875 20.9126 14.7438 20.8688 14.6562L19.8626 12.95C19.8188 12.8625 19.6876 12.8187 19.5563 12.8625L18.4188 13.3875C18.1563 13.1688 17.8501 12.9937 17.5438 12.8625L17.4126 11.5938C17.4126 11.4625 17.2813 11.375 17.1938 11.375H15.2251C15.0938 11.375 15.0063 11.4625 15.0063 11.5938L14.8751 12.8625C14.5688 12.9937 14.2626 13.1688 14.0001 13.3875L12.8626 12.8625C12.7313 12.8187 12.6001 12.8625 12.5563 12.95L11.5501 14.6562C11.5063 14.7438 11.5063 14.9188 11.6376 14.9625L12.6438 15.7063C12.6001 15.8813 12.6001 16.0563 12.6001 16.1875C12.6001 16.3187 12.6001 16.5375 12.6438 16.6687L11.6376 17.4125C11.5501 17.5 11.5063 17.6312 11.5501 17.7188L12.5563 19.425C12.6001 19.5125 12.7313 19.5562 12.8626 19.5125L14.0001 18.9875C14.2626 19.2063 14.5688 19.3812 14.8751 19.5125L15.0063 20.7812C15.0063 20.9125 15.1376 21 15.2251 21H17.1938C17.3251 21 17.4126 20.9125 17.4126 20.7812L17.5438 19.5125C17.8501 19.3812 18.1563 19.2063 18.4188 18.9875L19.5563 19.5125C19.6876 19.5562 19.8188 19.5125 19.8626 19.425L20.8688 17.7188C20.9126 17.6312 20.9126 17.4562 20.7813 17.4125L19.7751 16.6687ZM16.1876 18.4625C14.9188 18.4625 13.9126 17.4563 13.9126 16.1875C13.9126 14.9188 14.9188 13.9125 16.1876 13.9125C17.4563 13.9125 18.4626 14.9188 18.4626 16.1875C18.4626 17.4563 17.4563 18.4625 16.1876 18.4625Z" fill="#F34D10"></path>
                <path d="M16.1875 13.5625C14.7437 13.5625 13.5625 14.7437 13.5625 16.1875C13.5625 17.6312 14.7437 18.8125 16.1875 18.8125C17.6312 18.8125 18.8125 17.6312 18.8125 16.1875C18.8125 14.7437 17.6312 13.5625 16.1875 13.5625ZM16.1875 17.5C15.4438 17.5 14.875 16.9313 14.875 16.1875C14.875 15.4438 15.4438 14.875 16.1875 14.875C16.9313 14.875 17.5 15.4438 17.5 16.1875C17.5 16.9313 16.9313 17.5 16.1875 17.5Z" fill="#EA8124"></path>
                </svg>


                </span>
                    Issues</label>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="7" wire:model="selectedOpportunityTypes" id="job_7">
                    <span class="border-info rounded-sm border-2"></span>
                </label>
            </div>
            <div class="bg-light-light shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                <label for="job_8" class="mb-0 h5">
                <span class="svg-icon">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.625 3.0625H4.375C3.89375 3.0625 3.5 3.45625 3.5 3.9375V6.5625C3.5 7.04375 3.89375 7.4375 4.375 7.4375H16.625C17.1063 7.4375 17.5 7.04375 17.5 6.5625V3.9375C17.5 3.45625 17.1063 3.0625 16.625 3.0625Z" fill="#2A337E"></path>
                <path d="M16.625 8.3125H4.375C3.89375 8.3125 3.5 8.70625 3.5 9.1875V11.8125C3.5 12.2938 3.89375 12.6875 4.375 12.6875H16.625C17.1063 12.6875 17.5 12.2938 17.5 11.8125V9.1875C17.5 8.70625 17.1063 8.3125 16.625 8.3125Z" fill="#2A337E"></path>
                <path d="M16.625 13.5625H4.375C3.89375 13.5625 3.5 13.9562 3.5 14.4375V17.0625C3.5 17.5438 3.89375 17.9375 4.375 17.9375H16.625C17.1063 17.9375 17.5 17.5438 17.5 17.0625V14.4375C17.5 13.9562 17.1063 13.5625 16.625 13.5625Z" fill="#2A337E"></path>
                <path d="M19.7751 16.6687C19.8188 16.4937 19.8188 16.3187 19.8188 16.1875C19.8188 16.0563 19.8188 15.8375 19.7751 15.7063L20.7813 14.9625C20.8688 14.875 20.9126 14.7438 20.8688 14.6562L19.8626 12.95C19.8188 12.8625 19.6876 12.8187 19.5563 12.8625L18.4188 13.3875C18.1563 13.1688 17.8501 12.9937 17.5438 12.8625L17.4126 11.5938C17.4126 11.4625 17.2813 11.375 17.1938 11.375H15.2251C15.0938 11.375 15.0063 11.4625 15.0063 11.5938L14.8751 12.8625C14.5688 12.9937 14.2626 13.1688 14.0001 13.3875L12.8626 12.8625C12.7313 12.8187 12.6001 12.8625 12.5563 12.95L11.5501 14.6562C11.5063 14.7438 11.5063 14.9188 11.6376 14.9625L12.6438 15.7063C12.6001 15.8813 12.6001 16.0563 12.6001 16.1875C12.6001 16.3187 12.6001 16.5375 12.6438 16.6687L11.6376 17.4125C11.5501 17.5 11.5063 17.6312 11.5501 17.7188L12.5563 19.425C12.6001 19.5125 12.7313 19.5562 12.8626 19.5125L14.0001 18.9875C14.2626 19.2063 14.5688 19.3812 14.8751 19.5125L15.0063 20.7812C15.0063 20.9125 15.1376 21 15.2251 21H17.1938C17.3251 21 17.4126 20.9125 17.4126 20.7812L17.5438 19.5125C17.8501 19.3812 18.1563 19.2063 18.4188 18.9875L19.5563 19.5125C19.6876 19.5562 19.8188 19.5125 19.8626 19.425L20.8688 17.7188C20.9126 17.6312 20.9126 17.4562 20.7813 17.4125L19.7751 16.6687ZM16.1876 18.4625C14.9188 18.4625 13.9126 17.4563 13.9126 16.1875C13.9126 14.9188 14.9188 13.9125 16.1876 13.9125C17.4563 13.9125 18.4626 14.9188 18.4626 16.1875C18.4626 17.4563 17.4563 18.4625 16.1876 18.4625Z" fill="#F34D10"></path>
                <path d="M16.1875 13.5625C14.7437 13.5625 13.5625 14.7437 13.5625 16.1875C13.5625 17.6312 14.7437 18.8125 16.1875 18.8125C17.6312 18.8125 18.8125 17.6312 18.8125 16.1875C18.8125 14.7437 17.6312 13.5625 16.1875 13.5625ZM16.1875 17.5C15.4438 17.5 14.875 16.9313 14.875 16.1875C14.875 15.4438 15.4438 14.875 16.1875 14.875C16.9313 14.875 17.5 15.4438 17.5 16.1875C17.5 16.9313 16.9313 17.5 16.1875 17.5Z" fill="#EA8124"></path>
                </svg>


                </span>
                    Suggestions</label>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="8" wire:model="selectedOpportunityTypes" id="job_8">
                    <span class="border-info rounded-sm border-2"></span>
                </label>
            </div>
            <div class="bg-light-light shadow-none rounded mb-2 p-3 bg-hover-light-secondary d-flex justify-content-between align-items-start">
                <label for="job_8" class="mb-0 h5">
                <span class="svg-icon">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.625 3.0625H4.375C3.89375 3.0625 3.5 3.45625 3.5 3.9375V6.5625C3.5 7.04375 3.89375 7.4375 4.375 7.4375H16.625C17.1063 7.4375 17.5 7.04375 17.5 6.5625V3.9375C17.5 3.45625 17.1063 3.0625 16.625 3.0625Z" fill="#2A337E"></path>
                <path d="M16.625 8.3125H4.375C3.89375 8.3125 3.5 8.70625 3.5 9.1875V11.8125C3.5 12.2938 3.89375 12.6875 4.375 12.6875H16.625C17.1063 12.6875 17.5 12.2938 17.5 11.8125V9.1875C17.5 8.70625 17.1063 8.3125 16.625 8.3125Z" fill="#2A337E"></path>
                <path d="M16.625 13.5625H4.375C3.89375 13.5625 3.5 13.9562 3.5 14.4375V17.0625C3.5 17.5438 3.89375 17.9375 4.375 17.9375H16.625C17.1063 17.9375 17.5 17.5438 17.5 17.0625V14.4375C17.5 13.9562 17.1063 13.5625 16.625 13.5625Z" fill="#2A337E"></path>
                <path d="M19.7751 16.6687C19.8188 16.4937 19.8188 16.3187 19.8188 16.1875C19.8188 16.0563 19.8188 15.8375 19.7751 15.7063L20.7813 14.9625C20.8688 14.875 20.9126 14.7438 20.8688 14.6562L19.8626 12.95C19.8188 12.8625 19.6876 12.8187 19.5563 12.8625L18.4188 13.3875C18.1563 13.1688 17.8501 12.9937 17.5438 12.8625L17.4126 11.5938C17.4126 11.4625 17.2813 11.375 17.1938 11.375H15.2251C15.0938 11.375 15.0063 11.4625 15.0063 11.5938L14.8751 12.8625C14.5688 12.9937 14.2626 13.1688 14.0001 13.3875L12.8626 12.8625C12.7313 12.8187 12.6001 12.8625 12.5563 12.95L11.5501 14.6562C11.5063 14.7438 11.5063 14.9188 11.6376 14.9625L12.6438 15.7063C12.6001 15.8813 12.6001 16.0563 12.6001 16.1875C12.6001 16.3187 12.6001 16.5375 12.6438 16.6687L11.6376 17.4125C11.5501 17.5 11.5063 17.6312 11.5501 17.7188L12.5563 19.425C12.6001 19.5125 12.7313 19.5562 12.8626 19.5125L14.0001 18.9875C14.2626 19.2063 14.5688 19.3812 14.8751 19.5125L15.0063 20.7812C15.0063 20.9125 15.1376 21 15.2251 21H17.1938C17.3251 21 17.4126 20.9125 17.4126 20.7812L17.5438 19.5125C17.8501 19.3812 18.1563 19.2063 18.4188 18.9875L19.5563 19.5125C19.6876 19.5562 19.8188 19.5125 19.8626 19.425L20.8688 17.7188C20.9126 17.6312 20.9126 17.4562 20.7813 17.4125L19.7751 16.6687ZM16.1876 18.4625C14.9188 18.4625 13.9126 17.4563 13.9126 16.1875C13.9126 14.9188 14.9188 13.9125 16.1876 13.9125C17.4563 13.9125 18.4626 14.9188 18.4626 16.1875C18.4626 17.4563 17.4563 18.4625 16.1876 18.4625Z" fill="#F34D10"></path>
                <path d="M16.1875 13.5625C14.7437 13.5625 13.5625 14.7437 13.5625 16.1875C13.5625 17.6312 14.7437 18.8125 16.1875 18.8125C17.6312 18.8125 18.8125 17.6312 18.8125 16.1875C18.8125 14.7437 17.6312 13.5625 16.1875 13.5625ZM16.1875 17.5C15.4438 17.5 14.875 16.9313 14.875 16.1875C14.875 15.4438 15.4438 14.875 16.1875 14.875C16.9313 14.875 17.5 15.4438 17.5 16.1875C17.5 16.9313 16.9313 17.5 16.1875 17.5Z" fill="#EA8124"></path>
                </svg>


                </span>
                    Recommandations</label>
                <label class="checkbox checkbox-info">
                    <input type="checkbox" value="8" wire:model="selectedOpportunityTypes" id="job_8">
                    <span class="border-info rounded-sm border-2"></span>
                </label>
            </div>
            </div>

{{-- testing accordion --}}


    <div class="col-lg-9">

        <div class="row my-4 justify-content-center mb-5">
            <div class="col-md-12 " style="justify-content: center">
                <h3>Advocacy and complants

                </h3>
                <p>

                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit ducimus aliquam dolore quia unde corporis. Illum voluptatibus nam expedita quasi laborum, officiis minima cum. Consectetur porro neque tempore enim laborum sequi eveniet! Nam soluta nisi id, maiores repellendus delectus officia!
                </p>
            </div>
        </div>
        <div>
            <div class="row my-4 justify-content-center">
                <div class="col-12">
                    <x-search-input wire:model.debounce.500ms="search"/>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-xxl-12 col-md-12">
                {{-- <div class="card border-0"> --}}
                    <div class=" mb-7 hr-card  p-2 min-h-100px  d-flex align-items-md-center flex-column flex-md-row" style="border-left: 3px solid #2A337E">
                        <!--begin::Symbol-->
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column flex-grow-1 justify-content-center">
                            <!--begin::Title-->
                            <a href="#" class="text-info font-weight-bolder font-size-h4 text-hover-primary mb-1 accordion">
                                Blaise Viateur Niyigen
                                <svg style="float: right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" class="down"/>
                                  </svg>
                            </a>

                            <!--end::Title-->
                            <!--begin::Desc-->
                            <span class="text-dark-50 font-weight-normal font-size-sm panel">
                                    Digital solutions for companies Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quaerat voluptatum aperiam?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ipsum alias asperiores non nemo dolorum quo doloribus saepe id voluptate.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut perspiciatis excepturi, itaque ipsum necessitatibus adipisci, non est molestias neque tempore quibusdam assumenda deleniti accusamus reprehenderit iure. Sit reiciendis suscipit adipisci.
                                </span>
                            <!--begin::Desc-->
                            <div class="mt-2 d-flex  align-items-center justify-content-between">
                                <div>
                                                                    <div class="mr-2">
                                        <span class="mr-2">Tags</span>
                                        <strong>@iHuzo </strong>
                                    </div>

                                </div>
                                <div>
                                    <strong class="fa fa-reply">  Reply</strong>

                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                {{-- </div> --}}
            </div>



        </div>
            {{-- @include('partials.includes._pagination') --}}
        </div>


    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
      down.style.display = "none";
    } else {
        panel.style.display = "block";
        down.style.display = "block";
    }
  });
}
    </script>
</div>

</div>
