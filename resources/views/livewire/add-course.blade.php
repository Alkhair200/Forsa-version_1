   <form id="contact" method="POST" id="form_data">
       @csrf
       {{ method_field('post') }}
       <div class="row">
           <div class="col-lg-6">
               <fieldset>
                   <input type="name" name="name" wire:model="name" id="name" placeholder="@lang('welcome.name') "
                       autocomplete="on" required>
                   @error('name')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </fieldset>
           </div>
           <div class="col-lg-6">
               <fieldset>
                   <input type="text" name="email" wire:model="email" id="email" pattern="[^ @]*@[^ @]*"
                       placeholder="@lang('welcome.email')  " required="">
                   @error('email')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror

               </fieldset>
           </div>
           <div class="col-lg-12">
               <fieldset>
                   <input type="surname" name="subject" wire:model="subject" id="surname"
                       placeholder="@lang('welcome.subject') " autocomplete="on" required>
                   @error('subject')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </fieldset>
           </div>
           <div class="col-lg-12">
               <fieldset>
                   <textarea name="msg" wire:model="msg" class="form-control" id="message"
                       placeholder="@lang('welcome.msg') " required=""></textarea>
                   @error('msg')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </fieldset>
           </div>
           <div class="col-lg-12">
               <fieldset>
                   <button type="button" wire:click="submitData" id="form-submit" class="main-button ">
                       @lang('welcome.send msg') </button>
               </fieldset>
           </div>
       </div>
       <div class="contact-dec">
           <img src="{{ asset('front/assets/images/contact-decoration.png') }}" alt="">
       </div>
   </form>
