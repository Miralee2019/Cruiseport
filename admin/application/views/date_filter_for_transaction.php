<div class="col-md-12" style="margin-top: 4%" id="date_filtered_data">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Paymnet Key</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>No of rubs</th>
                <th>Status</th>
                <th>Date/Time</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($transactions)){ $cnt=1; foreach ($transactions as $transaction) { ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><a data-toggle="modal" data-target="#myModal"><?php echo $transaction->transaction_key; ?></a></td>
                <td><?php echo $transaction->method; ?></td>
                <td><?php echo $transaction->amount; ?></td>
                <td><?php echo $transaction->currency; ?></td>
                <td><?php echo $transaction->no_of_rubs; ?></td>
                 <td><?php echo $transaction->status; ?></td>
                <td><?php echo date('Y-m-d h:i  A',$transaction->created_at); ?></td>
                
            </tr>
        <?php } } ?>
           
        </tbody>
       
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
     var table = $('#example').DataTable({
        lengthChange: false,
        buttons: [ 'copy', 'excel','csv', 'pdf', 'colvis' ]
    });
     table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
    </script>
</div>