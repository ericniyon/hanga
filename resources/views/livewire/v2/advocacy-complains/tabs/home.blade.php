<div>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <style>
            /* Style the buttons that are used to open and close the accordion panel */

        .reply:hover{
            cursor: pointer;
        }

        .expand_caret {
    transform: scale(1.6);
    margin-left: 8px;
    margin-top: -4px;
}
a[aria-expanded='false'] > .expand_caret {
    transform: scale(1.6) rotate(-90deg);
}   .accordion {
          cursor: pointer;
          text-align: left;
          border: none;
          outline: none;
          transition: 0.4s;
        }
        .panel {
          /* background-color: white; */
          display: none;
          overflow: hidden;
        }
        .down{
            color: #2A337E;
            display: none;
            overflow: hidden;
        }
        .reply:hover{
            cursor: pointer;
        }
                /*  */
.comment-img {
  width:3rem;
  height:3rem;
}
.comment-replies .comment-img {
  width: 1.75rem;
  height: 1.75rem;
}
        </style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


        <div class="row">
            <div class="col-12 h-20px">
                <div wire:loading class="w-100 h-100">
                    <div class="h-100 w-100 d-flex  align-items-center justify-content-center">
                        <div>{{ __('app.Please wait') }} ... &nbsp;</div>
                        <img src="{{ asset('assets/loader.svg') }}" alt="" class="h-30px">
                    </div>
                </div>
            </div>

            @php
                $global_id=0;
            @endphp
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
                        Complants ({{ $this->total_Complants }}) </label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="Complants" wire:model="Complants" id="job_6">
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
                            Issues ({{ $this->total_Issues }})</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="Issues" wire:model="Issues" id="job_7">
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
                            Suggestions ({{ $this->total_Suggestions }})</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="Suggestions" wire:model="Suggestions" id="job_8">
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
                            Recommandations ({{ $this->total_Recommandations }})</label>
                        <label class="checkbox checkbox-info">
                            <input type="checkbox" value="Recommandations" wire:model="Recommandations" id="job_8">
                            <span class="border-info rounded-sm border-2"></span>
                        </label>
                    </div>
                    <div class=""  style="margin: 5em auto;">

                        <h3>
                        <a href="{{ route('client.response.tracker') }}" class="mt-5 pb-5" style="color: navy">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rss-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm1.5 2.5c5.523 0 10 4.477 10 10a1 1 0 1 1-2 0 8 8 0 0 0-8-8 1 1 0 0 1 0-2zm0 4a6 6 0 0 1 6 6 1 1 0 1 1-2 0 4 4 0 0 0-4-4 1 1 0 0 1 0-2zm.5 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                              </svg>
                                Track your feedback

                            </a>
                        </h3>
                    </div>



                    <button class="btn btn-md btn-outline-info mt-5" style="margin-bottom: 3em" data-toggle="modal" data-target="#ComplantsModal">Send Complants
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-x-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-4.854-1.354a.5.5 0 0 0 0 .708l.647.646-.647.646a.5.5 0 0 0 .708.708l.646-.647.646.647a.5.5 0 0 0 .708-.708l-.647-.646.647-.646a.5.5 0 0 0-.708-.708l-.646.647-.646-.647a.5.5 0 0 0-.708 0Z"/>
                          </svg>
                    </button>
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
                    {{-- <div class="row my-4 justify-content-center">
                        <div class="col-12">
                            <x-search-input wire:model.debounce.500ms="search"/>
                        </div>
                    </div> --}}

                    <div class="row mt-5 justify-content-center">
                        <div class="col-xxl-12 col-md-12">



                        {{-- <div class="card border-0"> --}}
                            @forelse ($advocacies as $item)

                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                            id="accordion1">


                           <div class="card bg-light-light shadow-none rounded-0 my-2 border overflow-hidden">
                               <div class="card-header">
                                   <div class="card-title collapsed pr-3" data-toggle="collapse"
                                        data-target="#collapse3-{{ $item->id }}">
                                       <div class="card-label pl-4">
                                            <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                            </svg>
                                                       </span>
                                            {{ $item->name ? $item->name :"" }}
                                       </div>
                                       <span class="svg-icon svg-icon-primary">
                                           @include('partials.icons._sort')
                                       </span>
                                   </div>
                               </div>
                               <div id="collapse3-{{ $item->id }}" class="collapse "
                                    data-parent="#accordion1">
                                   <div class="card-body p-2 bg-white ">
                                       <div class="p-2">
                                           <div class="checkbox-list">
                                            <p style="font-family: Poppins,sans-serif!important; font-size: 13px!important; font-weight: 400">

                                                {!! $item->complaint ? html_entity_decode($item->complaint) : '' !!}
                                            </p>

                                           </div>
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                      <h2 class="accordion-header" id="flush-headingOne">

                                                        <h4 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            @foreach ($item->client as $items)
                                                            {{-- {{ $item }}
                                                            {{ App\Models\Application::all() }} --}}
                                                            {{-- {{ \App\Models\Application::where('client_id', $item->id)->get() }} --}}
                                                            @forelse ($items->application as $itemsd)
                                                            <strong style="margin-right: 2rem">
                                                                #{{ $itemsd->msmeRegistration ? $itemsd->msmeRegistration : $itemsd->dspRegistration->company_name }}
                                                            </strong>
                                                            @empty

                                                            @endforelse
                                                            {{-- {{ $item->application }} --}}
                                                            @endforeach
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                                                <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                                                                <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
                                                              </svg> Reply
                                                        </h4>
                                                      </h2>
                                                      {{-- flush accordion --}}
                                                      @php
                                                          $global_id = $item->id
                                                      @endphp
                                                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body card">
                                                            <div class="bg-white rounded-3 shadow-sm p-4 mt-5">

                                                                <span class="mb-4"> # Replies
                                                                @forelse (App\Models\Reply::where('complaint', $item->id)->get() as $reply)
                                                                <div class="">
                                                                    <div class="py-3">
                                                                       <div class="d-flex comment">
                                                                          <img class="rounded-circle comment-img"
                                                                               src="https://via.placeholder.com/128/fe669e/ffcbde.png?text=S" />
                                                                          <div class="flex-grow-1 ms-3">
                                                                             <div class="mb-1"><a href="#" class="fw-bold link-dark me-1">

                                                                                @foreach (App\Models\Client::where('id', $reply->replyer)->get() as $item)
                                                                                {{ $item->name }}
                                                                                @endforeach
                                                                             </a>
                                                                             <span class="text-muted text-nowrap">  {{ $item->created_at->toFormattedDateString() }}  </span>
                                                                            </div>
                                                                             <div class="mb-2">
                                                                            {!! $reply->message ? html_entity_decode($reply->message) : '' !!}

                                                                            </div>
                                                                             <div class="hstack align-items-center mb-2">
                                                                                <a class="link-primary me-2" href="#"><i class="zmdi zmdi-thumb-up"></i></a>
                                                                                <!-- <span class="me-3 small">55</span> -->
                                                                                <a class="link-secondary me-4" href="#"><i class="zmdi zmdi-thumb-down"></i></a>
                                                                                {{-- <a class="link-secondary small" href="#">REPLY</a> --}}
                                                                             </div>

                                                                          </div>
                                                                       </div>

                                                                    </div>

                                                                 </div>
                                                                 @empty
                                                                 <p>Not yet replied</p>
                                                                @endforelse
                                                            </span>

                                                                <!-- Comment #1 //-->


                                                             </div>
                                                            <div class="card-body">
                                                                {{-- reply form --}}
                                                                {{-- @livewire('v2.advocacy-complains.reply-moder', ['item' => $item->id]) --}}
                                                                <form wire:submit.prevent="storeReply({{ $global_id }})">
                                                                    @csrf
                                                                        <div class="my-4" >

                                                                            <textarea  wire:model.defer="replyMessage"
                                                                            class="form-control rounded-0 border-2 border-info placeholder-dark" rows="8"
                                                                            placeholder="{{ __("write your reply") }}"></textarea>
                                                                        </div>

                                                                        <div class="my-4">
                                                                            <button type="submit" class="btn btn-info rounded-pill w-100">
                                                                                {{ __("app.send") }}
                                                                            </button>
                                                                        </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>


                                                  </div>
                                       </div>
                                   </div>
                                   {{-- second accordion --}}
                               </div>
                           </div>


                       </div>
                            @empty

                            @endforelse
                        {{-- </> --}}
                    </div>



                </div>
                    {{-- @include('partials.includes._pagination') --}}
                @include('partials.includes._pagination',['paginator'=>$advocacies])

                </div>


            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


        </div>

        </div>
    </div>
    @livewire('v2.advocacy-complains.model-form')
