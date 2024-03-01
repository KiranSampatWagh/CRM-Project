@extends('layouts.inv')
@extends('layouts.master')

@section('title', 'Invoice | ')
@section('content')
@include('partials.header')
@include('partials.sidebar')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Invoice</h1>
      <p></p>
    </div>

    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item"><a href="#">Invoice</a></li>
    </ul>
  </div>

  @if(session()->has('message'))
  <div class="alert alert-success">
    {{ session()->get('message') }}
  </div>
  @endif

  <div class="container" style=" width: 800px; margin-top: 10px; margin-bottom: 10px; ">
        
    <div class="card">
      <div class="card-header text-center">
        <h4>Invoice</h4>
      </div>
    
      <div class="card-body "> 
        <div class="row">
          <div class="col-8">
            <div class="form-group col-md">
              <label class="control-label">Customer Name</label>
              <input name="name" class="form-control" type="text" placeholder="Enter Customer Name">
            </div>

            <div class="form-group col-md">
              <label class="control-label">Customer Mobile</label>
              <input name="mobile" class="form-control" type="text" placeholder="Enter Mobile Number">
            </div>

            <div class="form-group col-md">
              <label class="control-label">Customer Email</label>
              <Input name="email" class="form-control" type="text" placeholder="Enter Email">
            </div>
            
            <div class="form-group col-md">
              <label class="control-label">Customer Address</label>
              <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
            </div>
          </div>
      
          <div class="col-4">
            <div class="form-group col-md">
              <label class="control-label">Inv. No</label>
              <input name="name" class="form-control" type="number" >
            </div>

            <div class="form-group col-md">
              <label class="control-label">Inv. Date</label>
              <input name="Date" class="form-control" type="date" >
            </div>
          </div>
        </div>
          
        <table class="table table-bordered  text-center">
          <thead class="table-secondary" >
            <tr>
              <th scope="col">No</th>
              <th scope="col">Product</th>
              <th scope="col">Qty</th>
              <th scope="col">Price</th>
              <th scope="col">Amount</th>
              <th scope="col" class="NoPrint"><button type="button" class="btn btn-secondary btn-sm" onclick="BtnAdd()">+</button></th>
            </tr>
          </thead>

          <tbody id="TBody">
            <tr id="TRow" class="d-none">
              <th scope="row">1</th>
              <td><input type="text" class="form-control" ></td>
              <td><input type="number" class="form-control text-center" name="qty" onchange="Calc(this);"></td>
              <td><input type="number" class="form-control text-end" name="rate" onchange="Calc(this);"></td>
              <td><input type="number" class="form-control text-end" name="amt" disable=""></td>
              <td class="NoPrint"><button type="button" class="btn btn-danger btn-sm" onclick="BtnDel(this);">X</button></td>
            </tr>
            <tr id="TRow">
              <th scope="row">1</th>
              <td><input type="text" class="form-control" ></td>
              <td><input type="number" class="form-control text-center" name="qty" onchange="Calc(this);"></td>
              <td><input type="number" class="form-control text-end" name="rate" onchange="Calc(this);"></td>
              <td><input type="number" class="form-control text-end" name="amt" disable=""></td>
              <td class="NoPrint"><button type="button" class="btn btn-danger btn-sm" onclick="BtnDel(this);">X</button></td>
            </tr>
          </tbody>
        </table>

        <div class="row">
          <div class="col-9">
            <div class="form-group text-center">
              <button class="btn btn-secondary" type="submit" >Submit</button>
              <button class="btn btn-secondary" type="print" onclick="GetPrint()">Print</button>
            </div>
          </div>

          <div class="col-3">
            <div class="form-group col-md">
              <label class="control-label">Sub Total</label>
              <input class="form-control text-end" type="number" id="FTotal" name="FTotal" disable="">
            </div>

            <div class="form-group col-md">
                <label class="control-label">Tax</label>
                <input class="form-control text-end" type="number" id="FTax" name="FTax" onchange="GetTotal();">
            </div>

            <div class="form-group col-md">
                <label class="control-label">Net Total</label>
                <input class="form-control text-end"  type="number" id="FNet" name="FNet" >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
  <script>
    function GetPrint()
    {
      window.print();
    }

    function BtnAdd()
    {
      var v = $("#TRow").clone().appendTo("#TBody");
      $(v).find("input").val('');
      $(v).removeClass("d-none");
    }

    function BtnDel(v)
    {
      $(v).parent().parent().remove();
      GetTotal();
    }

    function Calc(v)
    {
      var index = $(v).parent().parent().index();
      
      var qty = document.getElementsByName("qty")[index].value;
      var rate = document.getElementsByName("rate")[index].value;

      var amt = qty * rate;
      document.getElementsByName("amt")[index].value = amt;

      GetTotal();
    }

    function GetTotal()
    {
      var sum=0;
      var amts = document.getElementsByName("amt");

      for (let index = 0; index < amts.length; index++)
      {
          var amt = amts[index].value;
          sum = +(sum) + +(amt);
      }

      document.getElementById("FTotal").value = sum;

      var tax = document.getElementById("FTax").value;
      document.getElementById("FTax").value = tax;
      
      tax = +(tax) / +(100);
      tax = +(sum) * +(tax);

      var net = +(sum) + +(tax);
      document.getElementById("FNet").value = net;
    }

  </script>

@endsection