<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['open' => 'open', 'close' => 'close'], null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    {!! Form::select('supplier_id', $suppliers, null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<div id="purchaseProduct">
  <!-- Product Id Field -->
  <div class="form-group col-sm-6">
      {!! Form::label('product_id', 'Product:') !!}
      {!! Form::select('product_id[]', $products, null, ['class' => 'form-control select2form']) !!}
  </div>

  <!-- Product Id Field -->
  <div class="form-group col-sm-6">
      {!! Form::label('qty', 'qty:') !!}
      {!! Form::number('qty[]', null, ['class' => 'form-control']) !!}
  </div>

</div>
<div class="form-group col-sm-12">
  <button type="button" id="addButton">Add item</button>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#addButton").click(function(){
      var a = '{!! Form::label('product_id', 'Product:') !!}';
      var b = '{!! Form::select('product_id[]', $products, null, ['class' => 'form-control select2form']) !!}';
      var c = '{!! Form::label('qty', 'qty:') !!}';
      var d = '{!! Form::number('qty[]', null, ['class' => 'form-control']) !!}';
      $( "#purchaseProduct" ).append("<div class=\"form-group col-sm-6\">"+a+b+"</div><div class=\"form-group col-sm-6\">"+c+d+"</div>");
      $('.select2form').select2({
        theme: "bootstrap"
      });
    });
  });
</script>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchaseInvoices.index') !!}" class="btn btn-default">Cancel</a>
</div>
