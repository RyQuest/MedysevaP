 <table class="table vm table-small-font no-mb table-bordered table-striped dataTable no-footer">
    <tbody>
        <tr>
            <td>Request Amount</td>
            <td>{{$amount}}</td>
        </tr>
        <tr>
            <td>Current Amount</td>
            <td>{{$currentAmount}}</td>
        </tr>
        <tr>
            <td>TDS</td>
            <td>{{$tds}}</td>
        </tr>
        <tr>
            <td>Withdrawable</td>
            <td>{{$withdrawAble}}</td>
        </tr>
        @if($currentAmount < ($amount - $tds))
        <tr>
            <td colspan="2">
                <p class="text-danger">Insufficient amount in User wallet </p>
            </td>
        </tr>
        @endif
    </tbody>
</table>