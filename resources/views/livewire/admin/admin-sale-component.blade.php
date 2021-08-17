<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sell Setting
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" id="saledate" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#saledate').datetimepicker({
                format: 'Y:M:D h:m:s',
            })
            .on('dp.change', function(ev){
                var data = $('#saledate').val();
                @this.set('sale_date', data);
            });
        });
    </script>
@endpush
