<div class="row">
    <div class="col-md-12 col-12">
        <div class="card" style="height: 377.667px;">
            <div class="card-header">
                <h4 class="card-title">Payment Confirmation</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Payment Status: <b>{{$payment->payment_status}}</b></label>
                            </div>
                            <div class="col-md-6">
                                <label>MTCN Number: <b>{{$payment->mtn_no}}</b></label>
                            </div>
                            @if($payment->evidence)
                            <div class="col-md-6">
                                <label>Screenshot</label>
                                <a href="{{Storage::url($payment->evidence)}}">Evidence</a>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <label>Currency: <b>{{$payment->currency}}</b></label>
                            </div>
                            <div class="col-md-6">
                                <label>Qty: <b>{{$payment->qty}}</b></label>
                            </div>
                            <div class="col-md-6">
                                <label>Amount: <b>{{$payment->amount}}</b></label>
                            </div>
                            <div class="col-md-6">
                                <label>Paid Against: <b>{{$payment->paid_against}}</b></label>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#default">Confirm</button>
                                {{-- <button type="reset" class="btn btn-light-secondary">Reset</button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel1">Basic Modal</h3>
              <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                <i class="bx bx-x"></i>
              </button>
            </div>
            <div class="modal-body">
              <p class="mb-0">
               Are you sure you want confirm ?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
              </button>
              <button wire:click="store()" type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Yes</span>
              </button>
            </div>
          </div>
        </div>
      </div>
</div>
