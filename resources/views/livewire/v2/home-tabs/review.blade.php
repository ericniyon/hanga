<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="outer">
                <details>
                    <summary>Give a Review</summary>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="faq-content" style="height: 100%">
                       <!-- Table Reservation Form -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="row">
    			<div class="col-md-12 text-center">
    				<h2 class="text-primary">Review</h2>
    				<p class="mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti similique architecto nulla!</p>
    			</div>
    		</div>
            <form  role="form">
              <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text"  wire:model.defer="full_name" class="form-control" id="name" placeholder="Your Name">
                    @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="email" class="form-control" wire:model.defer="email" id="email" placeholder="Your Email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="tel" class="form-control" wire:model.defer="phone" id="phone" placeholder="Your Phone">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                    <textarea class="form-control" wire:model.defer="message" placeholder="Message"></textarea>
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="button" wire:click.prevent="store" class="btn btn-primary float-right mt-3">Submit</button>
            </form>

        </div>
    </section>
    <!-- End Table Reservation Form -->
                    </div>
                </details>
                </details>
            </div>
        </div>
    </div>
</div>
