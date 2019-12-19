@extends('layouts.app')

@section('content')
<div class="container">
    <form id="giomales" method="POST" action="{{ route('daily.store')}}">
            <div class="card card-primary">
                <div class="card-header"><h3 style="text-align:center">Daily Report </h3></div>
                <div class="card-body">
                    <div class="form-horizontal" >
                        {{ csrf_field() }}
                        <input type="hidden" name="user" id="user" value="{{Auth::user()->id}}">
                        <label class="col-md-2"> Date </label>
                        <div class="col-md-9">
                                <input id="date" type="date" class="form-control" name="date" value ="{{ date('Y-m-d', strtotime('now')) }}" required autofocus>
                                <!-- <input id="date" type="date" class="form-control" name="date" value ="{{ Carbon\Carbon::now()}}" required autofocus> -->
                        </div> 
                      
                    </div>
                </div>
            </div>
            <button type ="button" class="btn btn-success" id="btn1"> <i class="fa fa-plus-circle"> </i> Activities </button> <br> <br>
            <div id="card-activities">
              <div class="card card-primary cloningan" id="myactivities">
                  <div class="card-title"><h3 style="text-align:center"> My Report 
                    <button class="btn btn-card-tool delbutton" type="button"><i class="fa fa-times"></i></button> </h3>
                  </div>
                  <div class="card-body" id="activitycard">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label for="" class="col-md-2">Detail Activity</label>
                          <div class="col-md-9">
                        <input type="text" class="form-control ini" id="report_note" name="report_note" placeholder="Detail Activity">
                          </div>
                      </div>
                    </div>
                  </div>   
              </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Submit</button>  </form> 
              <form action="{{route('daily.index')}}"><button type="submit" class="btn btn-primary pull-left">Back To Report List</button></form>
            </div> 
          </div>
          
  </div>


@endsection

@section('script')
<script>  

var count = 1;

 
          // Global unique counter
    $('#btn1').click(function() {
        count++; // Increment counter
        $('.cloningan:first').clone(true).appendTo('#card-activities'). // Clone and append
          filter('[id]').each(function() { // For each new item with an ID
            this.id = this.id + '_' + count; // Append the counter to the ID
        });
    });

  $(document).on("click", ".delbutton", function() {
      // console.log($(".cloningan").length);
      if ($(".cloningan").length > 1) {
        $(this).parent().parent().remove();
      } else {
        alert("You can't remove this activity");
      }
  });

  $(document).on('submit', 'form', function(){
    $(this).find('.cloningan').each(function (i, el) {
      $(el).find('.ini').each(function(j, fel){
        var name = $(fel).attr('name');
        $(fel).attr('name', 'activities['+i+']['+name+']');
        // $(fel).attr('name', 'activities['+i+']['+name+']').reset();
      });
    });
  });


// $("#delbutton").click(function () {
//         var divCount = $("#myacitivities").children("div[id=activitybox]").length;
//         while (divCount > 1) // comparing with 1 beacuse: It will keep default div and remove/ rest
//     {       
//       $("#myactivities").children("div[id=activitybox]:last").remove();
//       divCount;
//     }
//  });
</script>

@endsection
            
                       