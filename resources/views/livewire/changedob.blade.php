<div>
  <div class="text-center text-white" style="padding: 20px; font-size: 25px; font-family: tahoma; font-weight: bold; background: #dd1922;">Update Your Date of Birth</div>
  <div style="background: #224794; padding: 0 30px 10px 30px;">
    <h2 class="text-center" style="color: white; padding-top: 10px; font-family: tahoma; margin-bottom: 5px;">السلام عليكم</h2>
    <p class="text-center" style="font-weight: bold; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color: white; font-size: 28px; line-height: 38px;">We are doing a mandatory survey from all applicants on our database.
      The information you provide below will be treated strictly confidential and only for our records.  Your date of birth will not be visible to other MySalafiSpouse applicants.</p>
    {{-- <div class="screen_width" style="border: 10px solid #f1be5a; border-radius: 10px; padding: 5px 40px; margin: 0 40px;">
      <h2 class="text-center" style="color: white; padding-top: 5px;">What is your date of birth?</h2>
      <form action="">
        <input type="date" value="" style="width: 20px;">
      </form>
    </div> --}}
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-12 col-md-6" style="border: 10px solid #f1be5a; border-radius: 10px; padding: 5px;">
        <h2 class="text-center" style="color: white; padding-top: 5px; margin-bottom: 10px;">What is your date of birth?</h2>
        <div class="text-center">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">
              <input type="date" class="form-control" wire:model="dob">
            </div>
            <div class="col-md-3"></div>
          </div>
          <h4 class="text-center text-white" style="margin: 7px 0; font-style: italic; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">For example: 01/10/1995</h4>
        </div>
      </div>
      <div class="col-md-3"></div>
      <div class="text-center">
        <button class="btn btn-success fw-bold text-white mt-3 btn-lg" wire:click="changedob">
          <span wire:loading.class="d-none" wire:target="changedob">SUBMIT</span>
          <span wire:loading wire:target="changedob">Processing</span>
        </button>
      </div>
    </div>
  </div>
</div>
